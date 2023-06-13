<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-3">My Anime List
                <a href="animes/create" class="btn btn-outline-primary mb-1">Add Your Anime</a>
            </h1>
            <?php if (session()->getFlashdata("message")) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata("message"); ?>
                </div>
            <?php endif ?>
            <table class=" table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($animeList as $anime) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="Sprite/AnimeCover/<?= $anime["cover"]; ?>" alt="" class="cover"></td>
                            <td><?= $anime["title"]; ?></td>
                            <td>
                                <a href="/animes/<?= $anime["slug"]; ?>" class="btn btn-outline-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>