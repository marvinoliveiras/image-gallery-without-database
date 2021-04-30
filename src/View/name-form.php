<?php require_once __DIR__.'/Template/header.php'; ?>
<section class="container-for-centralized-form">
    <form method="post" action="/admin/<?= $action ?>">
        <label for="galleryName">
            <?= $label ?>
        </label><br>
        <input type="text" name="name"/><br>
        <?= isset($oldName)
            ? "<input type=\"hidden\" name=\"oldName\" value=\"{$oldName}\"/>"
            :"";
        ?><?=
            isset($gallery)
            ? "<input type=\"hidden\" name=\"gallery\" value=\"{$gallery}\"/>"
            :"";
        ?>
        <button class="primary-btn">Submit</button>
    </form>
</section>
<?php require_once __DIR__.'/Template/footer.php'; ?>