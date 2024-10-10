<?php
    session_start();
    $dba = $_SESSION['db'];
    $conn = mysqli_connect("localhost","", "","$dba");
    $query = "SELECT * FROM `live` ORDER BY status DESC,finishes DESC";
    $dat = mysqli_query($conn,$query);

    if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Tracking - 1</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/logo/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/logo/favicon-16x16.png">
    <link rel="manifest" href="/logo/site.webmanifest">
    <link rel="mask-icon" href="/logo/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/logo/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/logo/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
    <div id="link_wrapper">

    </div>
</div>

</body>
</html>
<script>
function loadXMLDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("link_wrapper").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "server.php", true);
  xhttp.send();
}
setInterval(function(){
	loadXMLDoc();
	// 1sec
},1000);

window.onload = loadXMLDoc;
</script>
<?php }else{
    echo "<script>window.location.href='index.php';</script>";
}?>