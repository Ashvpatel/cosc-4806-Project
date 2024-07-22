<?php require_once 'app/views/templates/headerPublic.php'; ?>

<style>
    /* Custom styles for background and card */
    body {
        background: linear-gradient(to bottom right, #f0f4f8, #d9e2ec);
    }

    .card {
        background-color: #ffffff; /* White card background for contrast */
        border: 1px solid #dee2e6; /* Light border for card */
    }

    .card-header {
        background-color: #3C5A8E; /* Darker header background */
        color: #ffffff; /* White text for header */
    }
</style>

<main role="main" class="container mt-5">
    <div class="page-header text-center mb-4" id="banner">
        <h1 class="display-4">Welcome to Film Fusion!</h1>
        <p class="lead">Please log in to access all features.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h2 class="card-title mb-0">Login</h2>
                </div>
                <div class="card-body">
                    <form action="/login/verify" method="post">
                        <fieldset>
                            <div class="form-group">
                                <label for="username" class="font-weight-bold">Username</label>
                                <input required type="text" class="form-control form-control-lg" name="username" id="username" placeholder="Enter your username">
                            </div>
                            <div class="form-group">
                                <label for="password" class="font-weight-bold">Password</label>
                                <input required type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Enter your password">
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">Login</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once 'app/views/templates/footer.php'; ?>
