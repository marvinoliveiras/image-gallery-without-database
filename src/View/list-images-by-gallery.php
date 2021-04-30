<?php require __DIR__.'/Template/header.php'; ?>
<section id="modal-layer">
</section>
<main class="container">
    <?php if(count($images) > 0): ?>
        <?php foreach($images as $image): ?>
            <article class="thumbnail-container">
                <a class="link-view" href="/assets/img/gallery/<?= $gallery."/".$image ?>">
                    <img class="thumbnail-image" src="/assets/img/gallery/<?= $gallery."/".$image ?>" /><br>
                    <span class="img-name">
                        <?= $image ?>
                    </span>
                </a>
            </article>
        <?php endforeach ?>
    <?php else: ?>
        No image found.
    <?php endif ?>
</main>
<script src="/assets/js/list-images.js">
</script>
<?php require_once __DIR__.'/Template/footer.php'; ?>