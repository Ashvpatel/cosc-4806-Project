<?php require_once 'app/views/templates/headerPublic.php'; ?>

<main role="main" class="container">
    <div class="page-header text-center my-5" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-3 font-weight-bold text-primary">Film Fusion</h1>
                <p class="lead text-secondary">Your gateway to discovering and rating movies.</p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Search for a Movie</h2>
                    <form action="/movie/search" method="post">
                        <fieldset>
                            <div class="form-group">
                                <label for="movie" class="font-weight-bold">Movie</label>
                                <input required type="text" class="form-control form-control-lg" name="movie" id="movie" placeholder="Enter movie title...">
                            </div>
                            <br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Search</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center my-5">
        <p class="text-muted">Explore a wide range of movies and share your thoughts with us.</p>
    </div>
</main>

<?php require_once 'app/views/templates/footer.php'; ?>

