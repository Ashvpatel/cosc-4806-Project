<?php require_once 'app/views/templates/header.php'; ?>

<div class="container mt-5">
    <!-- Page Header -->
    <div class="page-header text-center mb-4" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-4">Welcome!</h1>
                <p class="lead text-muted"><?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            <p class="lead">To get started, please <a href="/login" class="btn btn-primary">Login</a></p>
        </div>
    </div>
</div>

<?php require_once 'app/views/templates/footer.php'; ?>

