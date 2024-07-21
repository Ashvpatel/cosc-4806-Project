<?php

class Api {

    public function search_movie($movie_title) {
        // Get the OMDB API key from environment variables
        $apiKey = $_ENV['omdb_key'];
        $url = "http://www.omdbapi.com/?t=" . urlencode($movie_title) . "&apikey=" . $apiKey;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response === false) {
            return ['error' => 'Error fetching data from OMDB API'];
        }

        return json_decode($response, true);
    }
}

?>
