<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Edit Anime Data</h2>
            <form action="/animes/update/<?= $anime["id"]; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $anime["slug"]; ?>">
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control 
                            <?= ($validation?->hasError("title") ? "is-invalid" : ""); ?>" id="title" name="title" autofocus value="
                            <?= $anime["title"]; ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation?->getError("title"); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="author" class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation?->hasError("author") ? "is-invalid" : ""); ?>" id="author" name="author" value="<?= $anime["author"]; ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation?->getError("author"); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="studio" class="col-sm-2 col-form-label">Studio</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation?->hasError("studio") ? "is-invalid" : ""); ?>" id="studio" name="studio" value="<?= $anime["studio"]; ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation?->getError("studio"); ?>
                        </div>
                    </div>
                </div>
                <div class=" row mb-3">
                    <label for="cover" class="col-sm-2 col-form-label">Cover</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="cover" name="cover" value="<?= $anime["cover"]; ?>">
                    </div>
                </div>
                <button type=" submit" class="btn btn-outline-primary">Change Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>