<?php
require_once __DIR__ . "/../controller/ContactController.php";
require_once __DIR__ . "/../controller/SessionController.php";

/**
 * Validate session before executing action
 */
SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //check if the call from the contactmanagement view includes needed parameter
    if (isset($_GET['contact-reply'])) {
        //load contact request object from database via controller
        $request = ContactController::getContactRequestById($_GET["contact-reply"]);
        //serialize the request object to pass it in the redirect as parameter
        $request = serialize($request);
        //redirect to view with parameter
        $host = $_SERVER['HTTP_HOST'];
        $uri = "webdev/public/view";
        $arr = explode('htdocs', __DIR__);
        $path = substr($arr[1], 0, strpos($arr[1], 'webdev'));
        $extra = 'replyrequest.php';
        header("Location: http://$host$path$uri/$extra/?request=$request");
        exit;
    }
}