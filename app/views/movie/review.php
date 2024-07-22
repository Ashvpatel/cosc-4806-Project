<?php require_once 'app/views/templates/headerPublic.php'; ?>
<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Movie Review</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <pre><?= htmlspecialchars($reviewContent) ?></pre>
        </div>
    </div>
</main>
<?php require_once 'app/views/templates/footer.php'; ?>
