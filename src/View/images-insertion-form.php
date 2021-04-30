<?php require_once __DIR__.'/Template/header.php'; ?>
<section class="container-for-centralized-form">
    <form method="POST" action="/admin/persist-images" enctype="multipart/form-data">
        <h1>Select the images to insert in the gallery:</h1><br>
        <label class="label-input-file" for="images">
            Select Files
        </label><div class="selected-files-input-file" id="file-name"></div><br>
        <input id="images" type="file" onchange='selectFileName(this)'
            class="label-input-file" name="images[]" multiple><br>
        <input type="hidden" name="gallery"
        value="<?= isset($gallery) ? $gallery: '';?>">
        <button class="primary-btn">Submit</button>
    </form>
</section>
<script src="/assets/js/select-file-name.js"></script>
<?php require_once __DIR__.'/Template/footer.php' ?>