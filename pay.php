<?php
require('./instamojo.php');
const API_KEY ="test_1e94b7b8c59575f5c789a0bd02c";
const AUTH_TOKEN="test_d6baaab2b822887eec78e4eae15";


if(isset($_POST['purpose']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['amount']))
{
    $api = new Instamojo\Instamojo(API_KEY, AUTH_TOKEN,'https://test.instamojo.com/api/1.1/');
    
    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $_POST['purpose'],
            "buyer_name" => $_POST['name'],
            "amount" => $_POST['amount'],
            "phone"=>$_POST['phone'],
            "address"=> $_POST['address'],
            "send_email" => true,
            "email" => $_POST['email'],
            "redirect_url" => "http://localhost:8888/original/success.html"
            ));
        header('Location:'. $response['longurl']);
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }
}
?>