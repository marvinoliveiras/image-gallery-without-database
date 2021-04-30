<?php
    $path = isset($_SERVER['PATH_INFO'])
        ? $_SERVER['PATH_INFO']:'';
    preg_match('/^(\/admin)/',$path,$section);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            <?= isset($pageTitle)? $pageTitle:'' ?>
        </title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href=
            "https://fonts.googleapis.com/css2?family=Catamaran:wght@100&display=swap"
            rel="stylesheet">
            <link rel="preconnect" href="https://fonts.gstatic.com">
        <link
            href="https://fonts.googleapis.com/css2?family=Original+Surfer&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="/assets/css/styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <header>
        <div class="logo">Gallery without DB</div>
        <nav>
            <ul>
                <?php if(isset($section[0])): ?>
                    <li>
                        <a href="/admin">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="/admin/list-all-galleries">
                            List galleries
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($path ==='/admin/manage-images-from-the-gallery'): ?>
                    <li>
                        <a href="/admin/images-insertion-form?gallery=<?= isset($_GET['gallery'])
                            ? $_GET['gallery']:'' ?>">
                            Insert images
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>
    </header>
    <?= isset($_SESSION['message']) && isset($_SESSION['messageType'])
        ? "<div class=\"alert ".$_SESSION['messageType']."\">"
            .$_SESSION['message']."</div>"
        : '';
        if(isset($_SESSION['message'])){
            unset($_SESSION['message']);
        }
    ?>