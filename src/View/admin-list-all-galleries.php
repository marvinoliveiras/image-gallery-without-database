<?php require 'Template/header.php'; ?>
<div class="container">
    <?php if(count($galleries) > 0): ?>
        <?php foreach($galleries as $gallery): ?>
            <article class="container-gallery">
                <div class="gallery">
                    <div class="row-top">
                    </div>
                    <div class="grid-images">
                        <?php foreach($gallery->getImages() as $image): ?>
                            <div class="frame-photo">
                                <img src="/assets/img/gallery/<?= $gallery->getName()."/".$image; ?>" />
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="name-gallery"><?= $gallery->getName(); ?></div>
                    <div class="menu-gallery">
                        <a href="/admin/rename-gallery-form?oldName=<?= $gallery->getName(); ?>" >
                            <img src="/assets/img/icons/edit.png" title="Rename" />
                        </a>
                        <a href="/admin/delete-gallery?name=<?= $gallery->getName(); ?>" >
                            <img id="delete" src="/assets/img/icons/delete.png" title="Delete" />
                        </a>
                        <a href="/admin/images-insertion-form?gallery=<?= $gallery->getName(); ?>" >
                            <img src="/assets/img/icons/add.png" title="Insert images" />
                        </a>
                        <a href="/admin/manage-images-from-the-gallery?gallery=<?= $gallery->getName(); ?>" >
                            <img src="/assets/img/icons/eye.png" title="View and manage Images" />
                        </a>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
        No gallery found!
    <?php endif; ?>
</div>
<?php require_once __DIR__.'/Template/footer.php'; ?>