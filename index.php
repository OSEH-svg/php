<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON welcome to TruHelp\n";
    $response .= "1. Talk to a therapist \n";
    $response .= "2. EMERGENCY RESPONSE";

} else if ($text == "1") {
    // Business logic for first level response
    $response = "CON Select from the list \n";
    $response .= "1. suicide prevention \n";
    $response .= "2. domestic violence complaints \n";


} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response = "call placement in progress...".$phoneNumber;

} else if($text == "1*1") { 
    // This is a second level response where the user selected 1 in the first instance
    $accountNumber  = "call placement in progress....";

    // This is a terminal request. Note how we start the response with END
    $response = "END Your account number is ".$accountNumber;

}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;