<?php

include '../inc/connect.php';

const WEBHOOK_SECRET = 'de929dab2d24820321512ea75c14c6bf31201b93a39eccc1bdc2f7f6fee847456761f8654c0206034dd58d07638da06f';
function verifySignature ($body, $signature) {
    $digest = hash_hmac('sha1', $body, WEBHOOK_SECRET);
    return $signature === $digest ;
}
if (!verifySignature(file_get_contents('php://input'), $_SERVER['HTTP_X_TAWK_SIGNATURE'])) {
    // verification failed
    // save the request body in .txt file
}

// convert the request body to json
$json = json_decode(file_get_contents('php://input'), true);

// get the message from the json
$transactionId = $json['transactionId'];
$status = $json['status'];

file_put_contents('request.txt', $transactionId);

$query = mysqli_query($conn, "SELECT *FROM customers WHERE `transaction_id` = '$transactionId'
                             LIMIT 1") or die(mysqli_error($conn));
    $row = mysqli_fetch_array($query);
    $offId = $row['offId'];
    $currDate = date('Y-m-d');

mysqli_query($conn, "UPDATE `customers` set `reserveStatus` = '$status', `approvedAt` = '$currDate' where `transaction_id` = '$transactionId'");

mysqli_query($conn, "UPDATE `offices` set `saleStatus` = 'reserved' where `id` = '$offId'");

?>