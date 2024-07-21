<?php

class Movie extends Controller {

    public function index() {
        $this->view('movie/index');
    }

    public function search() {
        if (!isset($_REQUEST['movie'])) {
            header('Location: /movie');
            die;
        }

        $api = $this->model('Api');
        $movie_title = $_REQUEST['movie'];
        $movie = $api->search_movie($movie_title);

        // Fetch the user's rating for the movie if logged in
        $user_rating = null;
        if (isset($_SESSION['auth'])) {
            $user = $this->model('User');
            $user_rating = $user->get_user_rating($movie_title);
        }

        // Check for errors in the movie data
        if (isset($movie['error'])) {
            $this->view('movie/error', ['error' => $movie['error']]);
        } else {
            $this->view('movie/results', ['movie' => $movie, 'user_rating' => $user_rating]);
        }
    }

    public function rate() {
        if (!isset($_SESSION['auth'])) {
            header('Location: /login');
            die;
        }

        $movie_title = $_POST['movie_title'];
        $rating = $_POST['rating'];

        if (in_array($rating, [1, 2, 3, 4, 5])) {
            $user = $this->model('User');
            $user->save_rating($movie_title, $rating);
        }

        header('Location: /movie/search?movie=' . urlencode($movie_title));
    }

    public function review($movie_title) {
        $api_key = $_ENV['GEMINI'];
        $url = "https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key=".$api_key;

        $data = array(
            "contents" => array(
                array(
                    "role" => "user",
                    "parts" => array(
                        array(
                            "text" => 'Write a review for the movie titled "' . $movie_title . '"'
                        )
                    )
                )
            )
        );

        $json_data = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response === false) {
            $this->view('movie/error', ['error' => 'Error fetching review from AI API']);
            return;
        }

        $review = json_decode($response, true);
        $this->view('movie/review', ['review' => $review]);
    }
}
?>
