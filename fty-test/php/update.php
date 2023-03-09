<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";
$conn = new mysqli($servername, $username, $password, $dbname);
if (empty($_GET['id'])) {
    exit();
}
$id = (int)$_GET['id'];
/*
$s='新通知';

$sql = "SELECT * FROM reply WHERE reply_status=1 AND receive_person='$id'";
$result = $conn->query($sql);
//$message = mysql_fetch_assoc($result); //expecting just on row

while ($rc = mysqli_fetch_assoc($result)) {
  extract($rc);
  $s = $s.'<a href="lost_post_view.php?Pet_ID=1"><div class="message">'.$send_person_name.'在的貼文發表了一則留言</div></a>';
}
$s = $s .'<br>舊通知';

$sql = "SELECT * FROM reply WHERE reply_status=2 AND receive_person='$id'";
$result = $conn->query($sql);
while ($rc = mysqli_fetch_assoc($result)) {
  extract($rc);
  $s = $s.'<a href="lost_post_view.php?Pet_ID=1"><div class="message">'.$send_person_name.'在的貼文發表了一則留言</div></a>';
}


echo $s;*/

$sql = "UPDATE reply SET reply_status = 2 WHERE reply_status=1 AND receive_person='$id'";
$conn->query($sql);

//echo json_encode( $json );


$conn->close();
?>