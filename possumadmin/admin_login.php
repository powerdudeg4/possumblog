<?php
session_start();
$cookie_name = "login";
$cookie_value = "none";
setcookie($cookie_name, $cookie_value, time() + (60 * 30), "/"); 
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>PossumBlog - Admin Panel Login</title>
		<link rel="stylesheet" href="https://unpkg.com/@sakun/system.css"/>
		<link rel="stylesheet" type="text/css" href="../css/nstyle.css">
	</head>
	<body>
		<script src="../script/script.js"></script>
		
		<ul role="menu-bar">
			<li role="menu-item" tabindex="0" href="../index.html"><a href="../index.html">Home</a></li>
			<li role="menu-item" tabindex="1" aria-haspopup="true">About me
		<ul role="menu">
			<li role="menu-item"><a href="../contactMe.html">Contact me</a></li>
			<li role="menu-item"><a href="../hardware.html">My hardware</a></li>
			<li role="menu-item"><a href="../myprojects.html">My projects</a></li>
		</ul>
		<ul role="menu">
			<li role="menu-item"><a href="../mymusic.html">My music</a></li></ul></li>
			<li role="menu-item" tabindex="2"><a href="../blog.php"> Blog</a></li>
		</ul>

		<h1>You really shouldn't be here! </h1>
			<form action="admin_login.php" method="POST">
				<a> Login: </a> <input type="text" name="login"><br> 
				<a> Password: </a> <input type="password" name="pass"><br> 
				<input type="submit" name="admin_login">
		</form>
<?php
if(isset($_POST['admin_login'])){
$conn = mysqli_connect(apache_getenv("POSSUMBLOGDATABASESRV"), apache_getenv("MYSQL_USER"), apache_getenv("MYSQL_PASSWORD"), apache_getenv("POSSUMBLOGDATABASE"));
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	$usrlogin = mysqli_query($conn, "SELECT login FROM login WHERE login='$login'");
	$usrhash = mysqli_query($conn, "SELECT password FROM login WHERE login='$login'");

if (mysqli_num_rows($usrlogin) == 0){
	echo "Wrong login or password";
	exit();
	mysqli_close($conn);
}
$row = mysqli_fetch_array($usrhash, MYSQLI_ASSOC);
$hash = $row['password'];
$succ = password_verify($pass, $hash);

if(password_verify($pass,$hash)){
	echo "Logging in";
	$cookie_name = "login";
	$cookie_value = "admin";
	setcookie($cookie_name, $cookie_value, time() + (60 * 30), "/");
	header( "Location: ./admin_panel.php" );
}else{
	echo "Wrong login or password";
}
mysqli_close($conn);
}
?>
	</body>
</html>
