<html>
  <head>
	<meta charset="UTF-8">
	<title>Mange Posts - PossumBlog</title>
   <link rel="stylesheet" href="https://unpkg.com/@sakun/system.css" />
    <link rel="stylesheet" type="text/css" href="../css/nstyle.css">

  </head>
	<body>
		<center>
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


	</div>

<?php

if(!isset($_COOKIE['login'])) {
  header( "Location: ../blog.php" );
}elseif ($_COOKIE['login']!="admin") {
  header( "Location: ../blog.php" );
}

//sign out element
if(isset($_POST['signout'])){
if (isset($_COOKIE['login'])) {
	unset($_COOKIE['login']);
	setcookie('key', '', time() - 3600, '/'); // empty value and old timestamp
}
}
?>
	<h1>Post editor</h1>
	<p> Input the ID of the post, and then it will be fetched from the database, allowing you to edit it. </p>

	<form action="manage_posts.php" method="POST">
	<p> Post ID: </p><input type="number" name="postid">
	<input type="submit" name="select" value="Select"><br><br>
	</form>

<?php
if(isset($_POST['select'])){
$conn = mysqli_connect(apache_getenv("POSSUMBLOGDATABASESRV"), apache_getenv("MYSQL_USER"), apache_getenv("MYSQL_PASSWORD"), apache_getenv("POSSUMBLOGDATABASE"));
$postid = $_POST['postid']; 
$sql = "SELECT identifier, postdate, title, content, tags, preview FROM post WHERE identifier='$postid'";
$posts = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($posts, MYSQLI_ASSOC)){
  echo "<form action='manage_posts.php' method='POST'>";
  echo "<br><textarea cols='80' rows='1' name='title'>", $row['title'], "</textarea><br>";
  echo "Posted on: ","<textarea cols='20' rows='1' name='date'>", $row['postdate'], "</textarea><br>";
  echo "<br><button class='btn' type='button' onlick='centertext()'> Center text</button>";
    echo "<button class='btn' type='button' onlick='boldtext()'> Bold text</button>";
      echo "<button class='btn' type='button' onlick='itallictext()'> Itallic text</button>";
  echo "<br><textarea cols='80' rows='12' name='content'>", $row['content'], "</textarea><br><br>";
  echo "ID: ","<br><textarea cols='30' rows='1' name='identifier'>", $row['identifier'], "</textarea><br><br>";
  echo "<br><br> To save changes, click Apply";
  echo "<br><input type='submit' name='modify' value='Apply'>";
  if($row['preview']==1){
  	echo "<br><br><br>This post is in preview mode, click the button below to publish it.";
  	echo "<br><input type='submit' name='publish' value='Publish the post'>";
  }
    if($row['preview']==0){
  	echo "<br><br><br>This post is currently published, click the button below to put it in preview mode.";
  	echo "<br><input type='submit' name='preview' value='Hide the post'>";
  }
  echo "<br><br><input type='submit' name='delete' value='Delete this post'>";
  echo "</form>";
}
}
if(isset($_POST['modify'])){
$conn = mysqli_connect(apache_getenv("POSSUMBLOGDATABASESRV"), apache_getenv("MYSQL_USER"), apache_getenv("MYSQL_PASSWORD"), apache_getenv("POSSUMBLOGDATABASE"));
$date  = $_POST['date'];
$content = $_POST['content'];
$title = $_POST["title"];
$identifier = $_POST['identifier'];
echo "Updated with the following: <br>";
echo $title, "<br>";
echo $content, "<br>";
echo $date, "<br>";
$sql = "UPDATE post SET title='$title', postdate='$date',content='$content' WHERE identifier='$identifier'";
mysqli_query($conn, $sql);
}
if(isset($_POST['publish'])){
$conn = mysqli_connect(apache_getenv("POSSUMBLOGDATABASESRV"), apache_getenv("MYSQL_USER"), apache_getenv("MYSQL_PASSWORD"), apache_getenv("POSSUMBLOGDATABASE"));
$date  = $_POST['date'];
$content = $_POST['content'];
$title = $_POST["title"];
$identifier = $_POST['identifier'];
echo "Updated with the following: <br>";
echo $title, "<br>";
echo $content, "<br>";
echo $date, "<br>";
$sql = "UPDATE post SET title='$title', postdate='$date',content='$content', preview='0' WHERE identifier='$identifier'";
mysqli_query($conn, $sql);
}
if(isset($_POST['preview'])){
$conn = mysqli_connect(apache_getenv("POSSUMBLOGDATABASESRV"), apache_getenv("MYSQL_USER"), apache_getenv("MYSQL_PASSWORD"), apache_getenv("POSSUMBLOGDATABASE"));
$date  = $_POST['date'];
$content = $_POST['content'];
$title = $_POST["title"];
$identifier = $_POST['identifier'];
echo "Updated with the following: <br>";
echo $title, "<br>";
echo $content, "<br>";
echo $date, "<br>";
$sql = "UPDATE post SET title='$title', postdate='$date',content='$content', preview='1' WHERE identifier='$identifier'";
mysqli_query($conn, $sql);
}

if(isset($_POST['delete'])){
$identifier  = $_POST['identifier'];
$conn = mysqli_connect(apache_getenv("POSSUMBLOGDATABASESRV"), apache_getenv("MYSQL_USER"), apache_getenv("MYSQL_PASSWORD"), apache_getenv("POSSUMBLOGDATABASE"));
echo "Deleted the post. <br>";

$sql = "DELETE FROM post WHERE identifier='$identifier'";
mysqli_query($conn, $sql);
}
?>

	<br><a href="admin_panel.php"> Admin Panel </a>
  </body>
</html>
