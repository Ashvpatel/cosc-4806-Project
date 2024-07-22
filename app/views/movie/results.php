<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Results</title>
    <link rel="stylesheet" href="path/to/bootstrap.css">
</head>
<body>
    <?php include 'app/views/templates/headerPublic.php'; ?>

    <main role="main" class="container my-5">
        <div class="page-header text-center mb-4" id="banner">
            <h1 class="display-4">Movie Results</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php if (isset($movie['error'])): ?>
                    <div class="alert alert-danger">
                        <strong>Error:</strong> <?= $movie['error'] ?>
                    </div>
                <?php else: ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h2 class="card-title"><?= $movie['Title'] ?></h2>
                        </div>
                        <div class="card-body">
                            <p><strong>Rating:</strong> <?= $movie['imdbRating'] ?></p>
                            <p><strong>Plot:</strong> <?= $movie['Plot'] ?></p>
                            <p><strong>Director:</strong> <?= $movie['Director'] ?></p>

                            <?php if (isset($_SESSION['auth'])): ?>
                                <form action="/movie/rate" method="post" class="mt-4">
                                    <input type="hidden" name="movie_title" value="<?= $movie['Title'] ?>">
                                    <div class="form-group">
                                        <label for="rating">Rate this movie:</label>
                                        <select name="rating" id="rating" class="form-control">
                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <option value="<?= $i ?>" <?= $user_rating == $i ? 'selected' : '' ?>><?= $i ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit Rating</button>
                                </form>
                            <?php endif; ?>

                            <a href="/movie/review/<?= urlencode($movie['Title']) ?>" class="btn btn-secondary mt-3">Get Review</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <?php include 'app/views/templates/footer.php'; ?>
    <script src="path/to/bootstrap.js"></script>
</body>
</html>
