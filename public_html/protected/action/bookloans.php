<?php
require_once "../controller/ValidationController.php";
require_once "../controller/LoanController.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET['date']) && isset($_GET['book-return'])) {
        $bookId = $_GET['book-return'];
        if($returned == "")
        {
            $returned = gmdate("Y-m-d");
        }
        else {
            $returned = $_GET['date'];
            $returned = changeDateToDatabaseFormat($returned);
        }
        $inputArray = ['bookId' => $bookId, 'returned' => $returned];
        $inputArray = ValidationController::validateInputArray($inputArray);
        if(!LoanController::returnBook($inputArray))
        {
            $errorArray = array();
            $errorArray[] = "Return book failed.";
        }
    }
    if (isset($_GET['memberID']) && isset($_GET['book-loan'])){
        $bookId = $_GET['book-loan'];
        $memberId = $_GET['memberID'];
        $inputArray = ['bookId' => $bookId, 'memberId' => $memberId];
        $inputArray = ValidationController::validateInputArray($inputArray);
        if(!LoanController::loanBook($inputArray))
        {
            $errorArray = array();
            $errorArray[] = "Return book failed.";
        }
    }
}

function changeDateToDatabaseFormat($date) : String{
    //changes dates to a database friendly format (YYYY-mm-DD)
    $dateArray = explode("/", $date);
    return $dateArray[2] . "-" .$dateArray[1] . "-" . $dateArray[0];
}
