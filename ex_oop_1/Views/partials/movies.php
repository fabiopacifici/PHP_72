<?php if (count($movies) > 0) : ?>
  <section class="movies">
    <h2>Movies</h2>

    <div class="container">
      <div class="row row-cols-3">


        <?php foreach ($movies as $movie) : ?>
          <div class="col">
            <div class="card">
              <img class="card-img-top" src='<?= $movie->poster ?>' alt='<?= $movie->title ?>' />
              <div class="card-body">
                <h3 class="card-title"><?= $movie->title ?></h3>
                <p>Duration: <?= $movie->duration ?> minutes</p>
                <p><?= $movie->summary ?></p>
              </div>
              <div class="card-footer">
                <small>
                  <?= $movie->get_movie_details(); ?>
                </small>
              </div>
            </div>
          </div>

        <?php endforeach ?>


      </div>
    </div>

  </section>
<?php endif; ?>