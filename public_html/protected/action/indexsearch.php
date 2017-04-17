<?php
require_once "../controller/ValidationController.php";
require_once "../controller/SearchController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();

    if (empty($_POST["searchText"]) == false) {
        $searchText = $_POST["searchText"];
        $searchText = ValidationController::validateInput($searchText);
        $resultBooks = SearchController::searchBooks($searchText);
        if ($resultBooks != null && count($resultBooks) > 0) {
            $resultBooks = serialize($resultBooks);
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/Webdev/public_html/src/view";
            $extra = 'searchresults.php';
            header("Location: http://$host$uri/$extra/?result-books=" . $resultBooks);
            exit;
        } else {
            echo "<h4>No books could be found using the provided search terms. Please <a href='../../src/index.php'>go back</a>";
        }
    } else {
        $errorArray[] = "Please provide valid search terms";
    }
} else {
    $errorArray[] = "Please provide valid search terms";
}
if (ValidationController::checkForErrors($errorArray)) {
    echo "<h4>Please <a href='../../src/index.php'>go back</a> and enter search terms again!</h4>";
}