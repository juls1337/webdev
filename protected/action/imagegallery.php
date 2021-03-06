<?php
require_once __DIR__ . "/../controller/ImageGalleryController.php";
require_once __DIR__ . "/../controller/SessionController.php";
require_once __DIR__ . "/../controller/ValidationController.php";

/**
 * Validate session before executing action
 */
SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    /**
     * Update gallery images
     */
    if (isset($_GET['update-gallery']) && isset($_GET['values'])) {
        $values = ValidationController::validateInputArray(json_decode($_GET["values"]));
        $galleryID = ValidationController::validateInput($_GET['update-gallery']);

        $imageIds = ImageGalleryController::getImageIdsByImageNames($values);

        if (ImageGalleryController::updateImageGallery($galleryID, $imageIds)) {
            //redirect to overview
            $host = $_SERVER['HTTP_HOST'];
            $uri = "webdev/public/view";
            $arr = explode('htdocs', __DIR__);
            $path = substr($arr[1], 0, strpos($arr[1], 'webdev'));
            $extra = 'imagegallery.php';
            header("Location: http://$host$path$uri/$extra");
            exit;
        } else {
            $errorArray[] = 'Visibility could not be updated';
        }

        if (ValidationController::checkForErrors($errorArray)) {
            echo "<h4>Please <a href='../../public/view/imagegallery.php'>go back</a> and try again!</h4>";
        }
    }

    /**
     * Update image gallery visibility
     */
    if (isset($_GET['image-gallery-visibility']) && isset($_GET['state'])) {

        $visibility = ValidationController::validateInput($_GET['image-gallery-visibility']);
        $state = ValidationController::validateInput($_GET['state']);

        //Call ImageGalleryController to update database field
        if (ImageGalleryController::updateImageGalleryVisibility($visibility, $state)) {
            //redirect to overview
            $host = $_SERVER['HTTP_HOST'];
            $uri = "webdev/public/view";
            $arr = explode('htdocs', __DIR__);
            $path = substr($arr[1], 0, strpos($arr[1], 'webdev'));
            $extra = 'imagegallery.php';
            header("Location: http://$host$path$uri/$extra");
            exit;
        } else {
            $errorArray[] = 'Visibility could not be updated';
        }

        if (ValidationController::checkForErrors($errorArray)) {
            echo "<h4>Please <a href='../../public/view/imagegallery.php'>go back</a> and try again!</h4>";
        }
    }
}