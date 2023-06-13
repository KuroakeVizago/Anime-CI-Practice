<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h1></h1>
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="/Sprite/AnimeCover/<?= $animeDetail["cover"]; ?>" class="img-fluid rounded-start" alt="Sprite/AnimeCover/<?= $animeDetail["cover"]; ?>">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $animeDetail["title"]; ?></h5>
              <p class="card-text">Author: <?= $animeDetail["author"]; ?></p>
              <p class="card-text"><small>Studio: <?= $animeDetail["studio"]; ?></small></p>

              <a href="/animes/edit/<?= $animeDetail["slug"]; ?>" class="btn btn-outline-warning">Edit</a>
              <form action="/animes/<?= $animeDetail["id"]; ?>" method="post" class="d-inline">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete this data?');">
                  Delete
                </button>
              </form>
              <br>
              <a href="/animes">Back To List</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>