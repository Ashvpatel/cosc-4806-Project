<?php require_once 'app/views/templates/headerPublic.php'; ?>

<main role="main" class="container">
    <div class="page-header text-center my-5" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-4">Movie Results</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?php if (isset($movie['error'])): ?>
                <div class="alert alert-danger">
                    <strong>Error:</strong> <?= htmlspecialchars($movie['error']) ?>
                </div>
            <?php else: ?>
                <h2><?= htmlspecialchars($movie['Title']) ?></h2>
                <p><strong>Rating:</strong> <?= htmlspecialchars($movie['imdbRating']) ?></p>
                <p><strong>Plot:</strong> <?= htmlspecialchars($movie['Plot']) ?></p>
                <p><strong>Director:</strong> <?= htmlspecialchars($movie['Director']) ?></p>
                <!-- Add other movie details as needed -->

                <?php if (isset($_SESSION['auth'])): ?>
                    <form action="/movie/rate" method="post">
                        <input type="hidden" name="movie_title" value="<?= htmlspecialchars($movie['Title']) ?>">
                        <div class="form-group">
                            <label for="rating">Rate this movie:</label>
                            <select name="rating" id="rating" class="form-control">
                                <option value="1" <?= $user_rating == 1 ? 'selected' : '' ?>>1</option>
                                <option value="2" <?= $user_rating == 2 ? 'selected' : '' ?>>2</option>
                                <option value="3" <?= $user_rating == 3 ? 'selected' : '' ?>>3</option>
                                <option value="4" <?= $user_rating == 4 ? 'selected' : '' ?>>4</option>
                                <option value="5" <?= $user_rating == 5 ? 'selected' : '' ?>>5</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Rating</button>
                    </form>
                <?php endif; ?>

                <a href="/movie/review/<?= urlencode($movie['Title']) ?>" class="btn btn-secondary mt-3">Get Review</a>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php require_once 'app/views/templates/footer.php'; ?>
