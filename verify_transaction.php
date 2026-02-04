<?php
$ref = $_GET['reference'];
if($ref == ""){
    // code...
    header("location:javascript://history.go(-1)");
}
?>

<?php
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_1b435be2dc9920bf9824f3b55ac75589df7deb99",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  }else {
    //echo $response;
    $result = json_decode($response);
  }
  if ($result->data->status == 'success'){
    $status = $result->data->status;
    $reference = $result->data->reference;
    $lname = $result->data->customer->last_name;
    $fname = $result->data->customer->first_name;

    $fullname = $lname.' '.$fname;
    $Cus_email = $result->data->customer->email;

    date_default_timezone_set('Africa/Lagos');
    $Date_time = date('m/d/Y h:i:s a', time());

    
$servername = "localhost";
$username = "root";
$pass = "1234";
$dbname = "alumnidb";

// Create connection
$conn = mysqli_connect($servername, $username, $pass, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 

    $stmt = $conn->prepare("INSERT INTO members_payments (`status`,`reference`, `fullname`, `date_purchased`, `email`) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $status, $reference, $fullname, $Date_time, $Cus_email);
    $stmt->execute();
    if(!$stmt) {
      echo 'There was problem on your code' . mysqli_error($conn);
  
    }else{
      header("Location: success.php?status=success");
      exit;
    }
    $stmt->close();
    $conn->close();

  }else{
    header("location: error.html");
    exit;
  }

?>