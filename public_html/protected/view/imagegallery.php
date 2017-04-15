<?php
require_once "../controller/SessionController.php";

SessionController::validateAdminSession();
?>
<html>
<head>
    <?php include '../../protected/view/parts/head.php'; ?>
</head>
<?php include '../../protected/view/parts/header.php'; ?>
<body>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Available Galleries</div>
        <table class="table table-hover table-bordered">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Number Of Images</td>
                <td>Status</td>
                <td>Update</td>
            </tr>
            <?php
            require_once "../controller/ImageGalleryController.php";
            $galleries = ImageGalleryController::getAllGalleries();
            foreach ($galleries as $gallery) {
                echo '<tr>';
                echo '<td>' . $gallery["0"] . '</td>';
                echo '<td>' . $gallery["1"] . '</td>';
                echo '<td>' . $gallery["2"] . '</td>';
                echo '<td><label class="radio-inline"><input type="radio" name="optradio">Hidden</label><label class="radio-inline"><input type="radio" name="optradio">Shown</label></td>';
                echo '<td><button class="btn btn-primary" type="button">Update</button></td>';
                echo '</tr>';
            }
            echo '<tr>';
            echo '</tr>';
            ?>
        </table>
    </div>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Gallery
            <span class="caret"></span></button>
        <ul id="imageGalleryDropdown" class="dropdown-menu">
            <?php
            $galleryNames = ImageGalleryController::getGalleryNames();
            foreach ($galleryNames as $name) { ?>
                <li><a href="#"><?php echo $name[0] ?></a></li>
            <?php } ?>
        </ul>
    </div>

    <div class="container" hidden>
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Available images</h2>
            </div>
            <select multiple="multiple" class="image-picker show-html">
                <?php
                $images = ImageGalleryController::getImages();
                foreach ($images as $image) {
                    ?>
                    <option data-img-src="http://localhost:<?php echo $_SERVER['SERVER_PORT'] ?>/Webdev/public_html/src/img/gallery/<?php echo $image['PictureRef'] ?>"
                            value="<?php echo $image['ImageID'] ?>"><?php echo $image['Name'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>
<!--                 <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive" src="http://placehold.it/400x300" alt="">
            </a>
        </div>-->
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include '../../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../../protected/view/parts/footer.php'; ?>
</html>



