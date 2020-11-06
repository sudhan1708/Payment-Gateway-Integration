<?php
require('./instamojo.php');
const API_KEY ="<<<<YOUR API  KEY>>>>";
const AUTH_TOKEN="<<<<YOUR TOKEN KEY>>>>>>>>";


if(isset($_POST['purpose']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['amount']))
{
    $api = new Instamojo\Instamojo(API_KEY, AUTH_TOKEN,'https://test.instamojo.com/api/1.1/'); //for test credentials use this link and for live credentials change it to www
    
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
