<html>
	<head>
		<meta charset="UTF-8">
		<title>The blog of powerdudeg4</title>
		<link rel="stylesheet" href="https://unpkg.com/@sakun/system.css" />
		<link rel="stylesheet" type="text/css" href="./css/nstyle.css">
  </head>
<body>
		<ul role="menu-bar">
			<li role="menu-item" tabindex="0" href="index.html"><a href="index.html">Home</a></li>
			<li role="menu-item" tabindex="1" aria-haspopup="true">About me
		<ul role="menu">
			<li role="menu-item"><a href="contactMe.html">Contact me</a></li>
			<li role="menu-item"><a href="hardware.html">My hardware</a></li>
			<li role="menu-item"><a href="myprojects.html">My projects</a></li>
		</ul>
		<ul role="menu">
			<li role="menu-item"><a href="mymusic.html">My music</a></li></ul></li>
			<li role="menu-item" tabindex="2"><a href="blog.php"> Blog</a></li>
		</ul>

<h1>Welcome to my blog</h1>
<p>I planned to make a blog for a long time now, so here's my shot at it. </p>

<?php
$conn = mysqli_connect(apache_getenv("POSSUMBLOGDATABASESRV"), apache_getenv("MYSQL_USER"), apache_getenv("MYSQL_PASSWORD"), apache_getenv("POSSUMBLOGDATABASE"));
$sql = 'SELECT identifier, postdate, title, content FROM post WHERE preview="0"';
$posts = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($posts, MYSQLI_ASSOC)){
  echo "<div class='window'>";
  echo "<div class='title-bar'>";
  echo "<button aria-label='Close' class='close'></button>";
  echo "<h1 class='title'>", $row['title'], "</h1>";
  echo "<button aria-label='Resize'class='resize'></button>";
  echo "</div>";
  echo "<div class='separator'></div>";
  echo "<div class='window-pane'>";
  echo "Posted on: ", $row['postdate'], "<br>";
  echo "<br> ", $row['content'], "<br>";
  echo "ID: ", $row['identifier'], "<br><br>";
  echo "</div>";
  echo "</div>";
} 
?>
  </body>
</html>
