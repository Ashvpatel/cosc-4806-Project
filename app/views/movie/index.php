<?php require_once 'app/views/templates/headerPublic.php'; ?>

<style>
/* Custom styles for animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translate3d(0, 100%, 0);
    }
    to {
        opacity: 1;
        transform: none;
    }
}

.fade-in-up {
    animation: fadeInUp 1s ease-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.fade-in {
    animation: fadeIn 1s ease-in;
}

/* Professional light gradient background */
body {
    background: linear-gradient(to bottom right, #f0f4f8, #d9e2ec);
    color: #333; /* Darker text for better readability */
}

.card {
    background-color: #3C5A8E; 
}
</style>

<main role="main" class="container fade-in-up">
    <div class="page-header text-center my-5" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-3 font-weight-bold text-primary fade-in">Film Fusion</h1>
                <p class="lead text-secondary fade-in">Your gateway to discovering and rating movies.</p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center fade-in-up">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4 fade-in-up">Search for a Movie</h2>
                    <form action="/movie/search" method="post">
                        <fieldset>
                            <div class="form-group fade-in-up">
                                <label for="movie" class="font-weight-bold">Movie</label>
                                <input required type="text" class="form-control form-control-lg" name="movie" id="movie" placeholder="Enter movie title...">
                            </div>
                            <br>
                            <div class="text-center fade-in-up">
                                <button type="submit" class="btn btn-primary btn-lg">Search</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center my-5 fade-in">
        <p class="text-muted">Explore a wide range of movies and share your thoughts with us.</p>
    </div>
</main>


<div class="container mt-5">


    <!-- Main Content -->
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            <p class="lead">To get started, please <a href="/login" class="btn btn-primary">Login</a></p>
        </div>
    </div>
</div>


<?php require_once 'app/views/templates/footer.php'; ?>
