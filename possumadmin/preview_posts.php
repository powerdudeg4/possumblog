<?php
session_start();
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Preview Posts - PossumBlog</title>
    <link rel="stylesheet" href="https://unpkg.com/@sakun/system.css"/>
    <link rel="stylesheet" type="text/css" href="../css/nstyle.css">
  </head>
 	<body>
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
    <p> Preview posts </p>

<?php
$conn = mysqli_connect(apache_getenv("POSSUMBLOGDATABASESRV"), apache_getenv("MYSQL_USER"), apache_getenv("MYSQL_PASSWORD"), apache_getenv("POSSUMBLOGDATABASE"));
$sql = 'SELECT identifier, postdate, title, content FROM post WHERE preview="1"';
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
    <form action="admin_login.php" method="POST">
      <center> <input type="submit" name="signout" value="Sign out">
    </form>
    <br><br><a href="admin_panel.php"> Admin Panel </a>
  </body>
</html>
