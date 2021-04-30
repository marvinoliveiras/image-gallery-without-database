<?php require 'Template/header.php'; ?>
<div class="container">
    <?php if(count($galleries) > 0): ?>
        <?php foreach($galleries as $gallery): ?>
            <article class="container-gallery">
                <a href=
                    "/view-images-from-the-gallery?gallery=<?= $gallery->getName() ?>">
                    <div class="gallery public-gallery">
                        <div class="row-top">
                        </div>
                        <div class="grid-images">
                            <?php foreach($gallery->getImages() as $image): ?>
                                <div class="frame-photo">
                                    <img src="/assets/img/gallery/<?= $gallery->getName()."/".$image; ?>" />
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="name-gallery">
                            <?= $gallery->getName(); ?>
                        </div>
                    </div>
                </a>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
        No gallery found!
    <?php endif; ?>
</div>
<?php require_once __DIR__.'/Template/footer.php'; ?>