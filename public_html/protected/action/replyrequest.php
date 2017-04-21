<?php
require_once "../controller/MailController.php";
require_once "../controller/SessionController.php";
require_once "../controller/ValidationController.php";
require_once "../controller/ContactController.php";

/**
 * Validate session before executing action
 */
SessionController::validateAdminSession();
//To test this feature, check the README!
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();
    $email = "";
    $id = "";
    $response = "";
    //check if all required fields are set
    if (empty($_POST["ID"]) != true) {
        $id = ValidationController::validateInput($_POST["ID"]);
    } else {
        $errorArray[] = 'ID must be set';
    }
    if (empty($_POST["email"]) != true) {
        $email = ValidationController::validateInput($_POST["email"]);
    } else {
        $errorArray[] = 'Email must be set';
    }
    if (empty($_POST["response"]) != true) {
        $response = ValidationController::validateInput($_POST["response"]);
    } else {
        $errorArray[] = 'Response must be set';
    }
    //check for errors
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../view/replyrequest.php'>go back</a> and response again!</h4>";
    } else {
        //no errors
        //call to controller to send mail to the requester
        if (MailController::sendMail($email, "Reply to your Request with the ID: " . $id, $response)) {
            //update the request object to keep track of already replied requests
            if (ContactController::setContactRequestToReplied($id)) {
                //redirect to overview
                $host = $_SERVER['HTTP_HOST'];
                $uri = "/Webdev/public_html/protected/view";
                $extra = 'contactmanagement.php';
                header("Location: http://$host$uri/$extra");
                exit;
            } else {
                $errorArray[] = 'Request could not be updated';
            }
        } else {
            $errorArray[] = 'Reply could not be sent';
        }
    }
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../view/replyrequest.php'>go back</a> and response again!</h4>";
    }
}