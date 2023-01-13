<?php
require 'vendor/autoload.php';

use Ramsey\Uuid\Uuid;

$msg = '';
if (isset($_POST['sendMessage'])) {
  $name = mysqli_real_escape_string($conn, $_POST['cusNames']);
  $phone = mysqli_real_escape_string($conn, $_POST['cusPhone']);
  $email = mysqli_real_escape_string($conn, $_POST['cusEmail']);
  $location = mysqli_real_escape_string($conn, $_POST['cusLocation']);
  $in =!$isSale? mysqli_real_escape_string($conn, $_POST['cusCheckin']):"";
  $out = !$isSale? mysqli_real_escape_string($conn, $_POST['cusCheckout']):"";
  $reserveCode = rand(100000000000000000, 1);
  $offId;
  $comId;
  $times = date("Y-m-d");
  $check = mysqli_query($conn, "SELECT *FROM customers WHERE offId = '$offId' AND `reserveStatus` != 'Cancelled'") or die(mysqli_error($conn));
  if (mysqli_num_rows($check) > 0) {
    $msg = "<div class='alert alert-danger alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h3>This office is already reserved.</h3>
                    </div>";
  } else {
    $query = "SELECT * FROM offices WHERE id = '$offId' LIMIT 1";
    $result = mysqli_query($conn, $query);

    // Fetch row
    $row = $result->fetch_assoc();
    
    // send payment request
    $transUuid = Uuid::uuid4();
    $transId = $transUuid->toString();

    $apiUrl = "https://opay-api.oltranz.com/opay/paymentrequest";

    $data = array(
      "telephoneNumber" => '25' . $phone,
      "amount" => $row['price'],
      "organizationId" => "e04a2697-f684-4356-98dc-1d368c3014ec",
      "description" => "Space Booking",
      "callbackUrl" => "https://1996-154-68-126-69.in.ngrok.io/spacebooking/forms/callback.php",
      "transactionId" => $transId,
    );

    // Encode POST data as JSON
    $jsonData = json_encode($data);

    // Set cURL options
    $options = array(
      CURLOPT_URL => $apiUrl,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $jsonData,
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData)
      )
    );
    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt_array($ch, $options);

    // Execute cURL request
    $response = curl_exec($ch);

    // Close cURL session
    curl_close($ch);

    if (empty($in) && empty($out)) {

      $saveSale = mysqli_query($conn, "INSERT INTO `customers` (`id`, `fullnames`, `phoneNumber`, `email`, `cusLocation`, `checkin`, `checkout`, `reserveStatus`, `offId`, `reserveId`, `companyId`, `resTime`, `approvedAt`, `transaction_id`)
                 VALUES (NULL, '$name', '$phone', '$email', '$location', '', '', 'Pending', '$offId', '$reserveCode','$comId','$times','', '$transId')") or die(mysqli_error($conn));

      $saveNot = mysqli_query($conn, "INSERT INTO `conotification` (`id`, `content`, `notTime`, `status`, `companyId`) VALUES ('', 'New customer booked sales space',NULL, 'unread','$comId')") or die(mysqli_error($conn));

      if ($saveSale) {
        sendsms($name, $phone, $reserveCode, $row);

        $msg = "<div class='alert alert-info alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h3>Proceed to confirm your payment</h3>
                    </div>";
      }
    } else {
      $saveRent = mysqli_query($conn, "INSERT INTO `customers` (`id`, `fullnames`, `phoneNumber`, `email`, `cusLocation`, `checkin`, `checkout`, `reserveStatus`, `offId`, `reserveId`,`companyId`, `resTime`, `approvedAt`, `transaction_id`)
                 VALUES (NULL, '$name', '$phone', '$email', '$location', '$in', '$out', 'Pending', '$offId', '$reserveCode','$comId','$times','', '$transId')") or die(mysqli_error($conn));

      $saveNot = mysqli_query($conn, "INSERT INTO `conotification` (`id`, `content`, `notTime`, `status`, `companyId`) VALUES ('', 'New customer booked Rent space',NULL, 'unread','$comId')") or die(mysqli_error($conn));

      if ($saveRent) {

        sendsms($name, $phone, $reserveCode, $row);
        $msg = "<div class='alert alert-success alert-dismissible' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                        <h3>Proceed to confirm your payment</h3>
                        </div>";
      }
    }
  }
}

function sendsms($names, $phone, $reserveCode, $row)
{

  $receiver = $phone;
  $sender = "+250789223264";
  $mssg = "Hello " . $names . " Your reservation for space:
    \n ".$row['name'].", located at ".$row['location']." on ".$row['price']."Rwf 
    has been successfully received and your reservation code is: " . $reserveCode;

  $data = array(
    "sender" => $sender,
    "recipients" => $receiver,
    "message" => $mssg,
  );

  $url = "https://www.intouchsms.co.rw/api/sendsms/.json";
  $data = http_build_query($data);
  $username = "bigwi";
  $password = "bigwi@2617";

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  $result = curl_exec($ch);
  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
}
