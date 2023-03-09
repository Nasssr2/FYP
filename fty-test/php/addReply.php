<?php
  if (isset($_POST['replyTextArea'])) {
    echo "yes";
  }
  if (isset($_GET['Pet_ID'])) {
      echo "yes<br>";
    echo $_GET['Pet_ID'];
    extract($_GET);
    echo "Pet id".$Pet_ID;
    echo "<br>";
    echo "receive person ".$receive_person;    
    echo "<br>";
    echo "send person: ".$Send_person;
    echo "<br>";
    echo "LOST POST ID: ".$lost_ID;    
    echo "<br>";
    $txt = $_POST['replyTextArea'];
    echo "textContent: ".$txt;
    //var_dump($_GET['Pet_ID']);
    
date_default_timezone_set('Asia/Hong_Kong');
echo  date('d-m-y h:i:sa');
  $date = date('d-m-y h:i:sa');
  $conn = new mysqli("127.0.0.1", "root", "", "testdb");
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }else echo "<br>connect db";
    

  $sql = "INSERT INTO `reply` (`textContent`, `reply_status`, `reply_dateTime`, `Send_person`,`send_person_name`, `receive_person`, `post_id`) VALUES ('$txt', '1', '$date','$Send_person','$Send_person_Name','$receive_person','$lost_ID');";

    
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
  }
  header("location:../lost_post_view.php?Pet_ID=$Pet_ID");
?>
