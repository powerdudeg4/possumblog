<?php
session_start();
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>PossumBlog Admin Panel</title>
		<link rel="stylesheet" href="https://unpkg.com/@sakun/system.css" />
		<link rel="stylesheet" type="text/css" href="../css/nstyle.css">
	</head>
<body>
<script src="../script/script.js"></script>
<!-- I think it looks better centered. -->
<br><br><br><br><br><center>


<?php
if(isset($_POST['signout'])){
if (isset($_COOKIE['login'])) {
	unset($_COOKIE['login']);
	setcookie('key', '', time() - 3600, '/'); // empty value and old timestamp
}
}
?>
<?php
if(!isset($_COOKIE['login'])) {
  header( "Location: ../blog.php" );
}elseif ($_COOKIE['login']!="admin") {
  header( "Location: ../blog.php" );
}
?>
<?php

echo "<h1> Welcome to PossumBlog Administration Panel!</h1>";
echo "PossumBlog is not production ready. Avoid running this instance untill PossumBlog is declared Release Ready.";
echo "<br><br>";
echo "Current signed in user: ", $_COOKIE["login"];
echo "<br> <a href='../blog.php'>View currently published posts</a>	";
echo "<br> <a href='create_entry.php'>Create a post</a>	";
echo "<br> <a href='manage_posts.php'>Manage current posts</a>	";
echo "<br> <a href='preview_posts.php'>View preview version posts</a>	";
echo "<br> <a href='permissions.php'>Modify user permissions</a>	";
echo "<br><br><br><br>";
echo "PossumBlog Version: 0.5.1-GPL_RELEASE";
echo "<br>";
echo "Current website location: ". $_SERVER['PHP_SELF'];
echo "<br>";
echo "Current server name: ", $_SERVER['SERVER_NAME'];
echo "<br>";
echo "Current HTTP host: ", $_SERVER['HTTP_HOST'];
echo "<br>";
?>
<br><br><br><br>
<form action="admin_login.php" method="POST">
	<center> <input type="submit" name="signout" value="Sign out">
</form>
  </body>
</html>
