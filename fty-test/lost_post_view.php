<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>遺失寵物互助網</title>
  <link rel="stylesheet" href="css/index.css">
  <script src="jslib/jquery-3.4.1.js"></script>
  <script type="text/javascript" src="jslib/index.js"></script>
  <link rel="stylesheet" href="css/lost_post_view.css?v=<?php echo time(); ?>">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js">
  </script>
  <script type="text/javascript">
    function setImg() {
      alert(document.getElementById("petImg2").src);
    }
  </script>
</head>

<body>
  <?php
    include('header.php'); 
    require_once('conn.php');

    extract($_GET);
    $sql = "SELECT * FROM lost_post NATURAL JOIN pet NATURAL JOIN user WHERE Pet_ID = '$Pet_ID'";
    $rs = mysqli_query($conn, $sql) or die ('<div class = "error"> SQL command fails : <br> ' . mysqli_error($conn) . " </div> ");// $ rs is the result set
    $num = mysqli_num_rows($rs);
    $rec = mysqli_fetch_assoc($rs);
    extract($rec);
  ?>
  <div>
    <div id="searchResult">
      <div id="searchResultTittle">
        <b>遺失寵物</b>
      </div>


      <div id="petImgDiv"><img id="petImg" src="./image/<?php echo $rec['Pet_image']; ?>"></div>

      <div id="PetName" class="data"><?php echo $rec['Pet_Name']; ?></div>

      <fieldset id="PetData">
        <legend>寵物資料</legend>
        <label>年齡:</label><label><?php echo $rec['Pet_Age']; ?></label><br>
        <label>品種:</label><label><?php echo $rec['Pet_Description']; ?></label><br>
        <label>性別:</label><label><?php echo $rec['Pet_Sex']; ?></label><br>
        <label>體重:</label><label><?php echo $rec['Pet_weight']; ?></label><br>
        <label>晶片:</label><label><?php echo $rec['Pet_chip']; ?></label><br>
        <label>顏色:</label><label><?php echo $rec['Pet_color']; ?></label><br>
        <label>特徵:</label><label><?php echo $rec['Pet_feature']; ?></label><br>
      </fieldset>
      <fieldset id="Contact">
        <legend>聯絡人資料</legend>
        <label>聯絡人:</label><label><?php echo $rec['name']; ?></label><br>
        <label>電話:</label><label><?php echo $rec['phone_Number']; ?></label><br>
      </fieldset>
      <fieldset id="LostDayTime">
        <legend>走失日期</legend>
        <label>日期:</label><label><?php echo $rec['date']; ?></label>
        <label>時間:</label><label><?php echo $rec['time']; ?></label><br>
        緯度:<label id="Latitude"><?php echo $latitude; ?></label>
        經度:<label id="Longitude"><?php echo $longitude; ?></label>
      </fieldset>
      <fieldset id="LostPlace">
        <legend>走失地點</legend>
        <label>地區:</label><label><?php echo $rec['area']; ?></label><br>
        <label>位置:</label><label><?php echo $rec['Place']; ?></label><br>
        <label>詳情:</label><label><?php echo $rec['Details']; ?></label><br>
      </fieldset>
      <fieldset id="LostPlaceMap"></fieldset>
      <script type="text/javascript">
        document.getElementById('LostPlaceMap').innerHTML = '<iframe width="300" height="170" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=' + document.getElementById('Latitude').textContent + ',' + document.getElementById('Longitude').textContent + '&hl=hk&z=16&amp;output=embed"></iframe>';
      </script>
      <button id="button" title="Generate PDF"><img src="web_image/pdf.png" alt="generate pdf btn"></button>

    </div>
  </div>
  <div id="messageBoard">
    <b id="messageBoardTittle">留言板</b>
    <hr>
    <center>
      <div class="replyDiv">
        <form action="php/addReply.php?Pet_ID=<?php echo $Pet_ID?>&receive_person=<?php echo $User_ID?>&Send_person=<?php echo $_SESSION['User_ID']?>&lost_ID=<?php echo $lost_ID?>&Send_person_Name=<?php echo $_SESSION['User_Name']?>" method="post">
          <div class="replyName"><?php echo $_SESSION['User_Name'] ?> <input type="submit" value="發佈"></div><br>
          <textarea name="replyTextArea" id="" placeholder="這裡需要一條留言" cols="30" rows="10" required></textarea>

        </form>
        <hr>
        <div id="reply">

          <?php
      $sql = "SELECT reply_id,textContent,send_person_name,reply_dateTime FROM reply WHERE post_id=$lost_ID Order by reply_id DESC"; 


      $rs = mysqli_query($conn, $sql);
      while ($rc = mysqli_fetch_assoc($rs)) {
       ?>
          <div>
            <div class="replyName"><?php echo $rc['send_person_name']; ?></div><br>
            <div class="replyText" style="white-space: pre-line;"><?php echo $rc['textContent']; ?></div>
            <div class="replyTime"><?php echo $rc['reply_dateTime']; ?></div>
            <hr>
          </div>

          <?php
      }
    ?>


          <br>
        </div>
      </div>
    </center>

  </div>


  <div class="card" id="makepdf" style="display:none">
    <div>
      <h1>走失寵物 <?php echo $rec['Pet_Name']; ?></h1>
    </div>
    <table>
      <tr>
        <td><img style="width:400px;height:400px;" src="./image/<?php echo $rec['Pet_image']; ?>">
        </td>
        <td>
          <fieldset style="width:300px;">
            <legend>寵物資料:</legend>
            <label>年齡:</label><label><?php echo $rec['Pet_Age']; ?></label><br>
            <label>品種:</label><label><?php echo $rec['Pet_Description']; ?></label><br>
            <label>性別:</label><label><?php echo $rec['Pet_Sex']; ?></label><br>
            <label>體重:</label><label><?php echo $rec['Pet_weight']; ?></label><br>
            <label>晶片:</label><label><?php echo $rec['Pet_chip']; ?></label><br>
            <label>顏色:</label><label><?php echo $rec['Pet_color']; ?></label><br>
            <label>特徵:</label><label><?php echo $rec['Pet_feature']; ?></label><br>
          </fieldset>
          <fieldset id="Contact">
            <legend>聯絡人資料:</legend>
            <label>聯絡人:</label><label><?php echo $rec['name']; ?></label><br>
            <label>電話:</label><label><?php echo $rec['phone_Number']; ?></label><br>
          </fieldset>
          <fieldset id="LostDayTime">
            <legend>走失日期:</legend>
            <label>日期:</label><label><?php echo $rec['date']; ?></label><br>
            <label>時間:</label><label><?php echo $rec['time']; ?></label><br>
          </fieldset>
        </td>
      </tr>
    </table>
    <fieldset id="LostPlace">
      <legend>走失地點:</legend>
      <label>地區:</label><label><?php echo $rec['area']; ?></label><br>
      <label>位置:</label><label><?php echo $rec['Place']; ?></label><br>
      <label>詳情:</label><label><?php echo $rec['Details']; ?></label><br>
    </fieldset>
    <div id="pdfMap">
      <script type="text/javascript">
        document.getElementById('pdfMap').innerHTML = '<iframe width="100%" height="40%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=' + document.getElementById('Latitude').textContent + ',' + document.getElementById('Longitude').textContent + '&hl=hk&z=16&amp;output=embed"></iframe>';
      </script>
    </div>
  </div>
  <?php
    mysqli_free_result($rs);
    mysqli_close($conn);
  ?>
  <br>
  <br>
</body>
<script>
  var button = document.getElementById("button");
  var makepdf = document.getElementById("makepdf");

  button.addEventListener("click", function() {
    alert("如果pdf中的地圖沒有完整顯示,請隨意更改PDF配置以重新加載地圖");
    var mywindow = window.open("", "PRINT",
      "height=400,width=600");

    mywindow.document.write(makepdf.innerHTML);

    mywindow.document.close();
    mywindow.focus();

    mywindow.print();
    //mywindow.close();

    return true;
    //date_default_timezone_set('Asia/Hong_Kong');
    //echo  date('d-m-y h:i:sa');
  });
</script>

</html>