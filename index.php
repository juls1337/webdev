<html>
<head>
    <?php include realpath(dirname(__DIR__)) . '/webdev/public/view/parts/head.php'; ?>
</head>
<?php include realpath(dirname(__DIR__)) . '/webdev/public/view/parts/header.php'; ?>
<body>
<?php
$pageName = basename(__FILE__, '.php');
$arr = explode('htdocs', __DIR__);
$path = $arr[1];
setcookie("path", $path);

require_once dirname(__DIR__) . '/webdev/protected/controller/ContentController.php';
require_once dirname(__DIR__) . '/webdev/protected/entities/PageContent.php';
require_once dirname(__DIR__) . '/webdev/protected/controller/ImageGalleryController.php';
$content = ContentController::getContentByPageName($pageName);
?>
<div class="outer col" data-placeholder-label="Header">

    <?php
    $visibility = ImageGalleryController::getGalleryVisibilityByPageName($pageName);

    if (isset($visibility) && $visibility->getState() == 1) {
    ?>
    <div id="imageGalleryWrapper">
        <?php

        include dirname(__DIR__) . '/webdev/public/view/parts/imagegallery.php';
        } ?>
    </div>

    <div class="mainSearchWrapper">
        <div class="heading"><h1><?php if (isset($content)) {
                    echo $content->getHeadline();
                } ?></h1>
            <label><?php if (isset($content)) {
                    echo $content->getContent();
                } ?></label></div>
        <div class="searchBox">
            <div id="searchbox_div">
                <!-- Form for searching both the title and author of books to the given string-->
                <form name="searchForm" action="protected/action/indexsearch.php" method="post">
                    <input id="searchTextbox" name="searchText" type="text" minlength="3"
                           title="At least 3 characters required" required/>
                    <input type="submit" id="searchBtn"/>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include dirname(__DIR__) . '/webdev/public/view/parts/scripts.php'; ?>
</body>
<?php include dirname(__DIR__) . '/webdev/public/view/parts/footer.php'; ?>
</html>


