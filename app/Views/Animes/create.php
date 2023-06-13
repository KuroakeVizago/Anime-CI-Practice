<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Add New Anime Data</h2>
            <form action="/animes/save" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation?->hasError("title") ? "is-invalid" : ""); ?>" id="title" name="title" autofocus value="<?= old("title"); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation?->getError("title"); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="author" class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation?->hasError("author") ? "is-invalid" : ""); ?>" id="author" name="author" value="<?= old("author"); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation?->getError("author"); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="studio" class="col-sm-2 col-form-label">Studio</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation?->hasError("studio") ? "is-invalid" : ""); ?>" id="studio" name="studio" value="<?= old("studio"); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation?->getError("studio"); ?>
                        </div>
                    </div>
                </div>
                <div class=" row mb-3">
                    <label for="cover" class="col-sm-2 col-form-label">Cover</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="cover" name="cover" value="<?= old("cover"); ?>">
                    </div>
                </div>
                <button type=" submit" class="btn btn-outline-primary">Submit Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>