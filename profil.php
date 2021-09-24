<?php 
session_start();
if($_SESSION['idr'] == 1) {
?>

<html>
<head>
<title>Bonsoir</title>
</head>
<body>
<p>Bonsoir bonsoir bonsoir</p>
</body>
</html>

<?php 
}
if($_SESSION['idr'] == 2) {
?>

<html>
<head>
<title>Bonjour</title>
</head>
<body>
<p>Bonjour bonjour bonjour</p>
</body>
</html>


<?php 
}
?>