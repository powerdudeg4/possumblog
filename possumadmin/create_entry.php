<?php
session_start();
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Create a post - PossumBlog</title>
		<link rel="stylesheet" href="https://unpkg.com/@sakun/system.css" />
		<link rel="stylesheet" type="text/css" href="../css/nstyle.css">
	</head>
<body>
<script src="../script/postmanager.js"></script>
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


<center>

<?php
if(!isset($_COOKIE['login'])) {
  header( "Location: ../blog.php" );
}elseif ($_COOKIE['login']!="admin") {
  header( "Location: ../blog.php" );
}
?>
<?php
if(isset($_POST['signout'])){
if (isset($_COOKIE['login'])) {
	unset($_COOKIE['login']);
	setcookie('key', '', time() - 3600, '/'); // empty value and old timestamp
}
}
?>
	<h1>Create a post
	</h1>
	<form action="create_entry.php" method="POST">
	<p1> Date: </p1><br>
	<br> <input type="text" name="date"> <br><br>
	<p1> Title: </p1>
	<br> <br><textarea cols="80" rows="1" name="title"></textarea>
	<br><br><p1> Content: </p1><br><br>
	<!--- quick fix by adding a duplicate name/id so we can add basic text styling --->
	<!--- TODO: pls fix --->

<button  class="btn" type="button" onclick="centertext()"> Center Text</button>
<button  class="btn" type="button" onclick="boldtext()"> Bold Text</button>
<button  class="btn" type="button" onclick="itallictext()"> Itallic Text</button>
	<br><br> <textarea cols="80" rows="12" name="content" id="content"></textarea>
	<br><input type="submit" name="preview" value="Preview"> 
	<input type="submit" name="publish" value="Publish"><br><br><br><br><br>
	</form>
<?php
if(isset($_POST['preview'])){
$conn = mysqli_connect(apache_getenv("POSSUMBLOGDATABASESRV"), apache_getenv("MYSQL_USER"), apache_getenv("MYSQL_PASSWORD"), apache_getenv("POSSUMBLOGDATABASE"));
$title = $_POST['title'];
$content = $_POST['content'];
$postdate = $_POST['date'];

if(empty($title) && empty($content)){
  echo "Please insert the title and the content.";
  exit();
}
$post = "INSERT INTO post(postdate, title,content,tags, preview) VALUES ('$postdate', '$title', '$content', 'none', '1')";
mysqli_query($conn, $post);
echo "Sending the post as a preview<br><br>";
mysqli_close($conn);
}

if(isset($_POST['publish'])){
$conn = mysqli_connect(apache_getenv("POSSUMBLOGDATABASESRV"), apache_getenv("MYSQL_USER"), apache_getenv("MYSQL_PASSWORD"), apache_getenv("POSSUMBLOGDATABASE"));
$title = $_POST['title'];
$content = $_POST['content'];
$postdate = $_POST['date'];

if(empty($title) || empty($content)){
  echo "Please insert the title and the content.";
  exit();
}
$post = "INSERT INTO post(postdate, title,content,tags) VALUES ('$postdate', '$title', '$content', 'none')";
mysqli_query($conn, $post);
echo "Publishing the post<br><br>";
mysqli_close($conn);
}
?>

	<br><br><a href="admin_panel.php"> Admin Panel </a><br><br>

	<form action="admin_login.php" method="POST">
	  <center> <input type="submit" name="signout" value="Sign out">
	</form>
  </body>
</html>
