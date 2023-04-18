<?php
session_start();
$conn = mysqli_connect(apache_getenv("POSSUMBLOGDATABASESRV"), apache_getenv("MYSQL_USER"), apache_getenv("MYSQL_PASSWORD"), apache_getenv("POSSUMBLOGDATABASE"));
$login = $_COOKIE['login'];
$result = mysqli_query($conn, "SELECT permissions FROM login WHERE login='$login'");


while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    if ($row['permissions']!="root") {
      echo "this error message had profanity and has been replaced with this, oops";
      header( "Location: ../blog.php" );
    }
}

?>
<html>
  <head>
    <meta charset="UTF-8">

    <title>Permissions - PossumBlog</title>
        <link rel="stylesheet" href="https://unpkg.com/@sakun/system.css"/>
        <link rel="stylesheet" type="text/css" href="../css/nstyle.css">

  </head>
  <center>
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
}elseif ($_COOKIE['login']!="michal") {
  header( "Location: ../blog.php" );
}
?>
<?php

echo "<h1> Welcome to PossumBlog Permissions editor</h1>";
echo "Current signed in user: ", $_COOKIE["login"];
echo "<h3> Modify permissions for user</h3>";


?>
<?php
$conn = mysqli_connect(apache_getenv("POSSUMBLOGDATABASESRV"), apache_getenv("MYSQL_USER"), apache_getenv("MYSQL_PASSWORD"), apache_getenv("POSSUMBLOGDATABASE"));
$result = mysqli_query($conn, "SELECT login FROM login");

echo "<select name='login'>";
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
  echo "<option value='".$row['login']."'>".$row['login']."</option>";
  echo $row['permissions'];
}
echo "</select>";
echo "<form action='permissions.php' method='POST'><input type='submit' name='selecteduser'></form>"

/* Continue here:
    We now have a drop down with user names, now based on the selection, we will retrieve permissions and put them as drop downs the administrator can change and apply. 
    NOTE: root can lock itself out.
    */
?>
<?php
echo "<br><br><br><br>";
echo "Current website location: ". $_SERVER['PHP_SELF'];
echo "<br>";
echo "Current server name: ", $_SERVER['SERVER_NAME'];
echo "<br>";
echo "Current HTTP host: ", $_SERVER['HTTP_HOST'];
echo "<br>";


?>
<a href="admin_panel.php"> Admin Panel </a>

	<br><br><br><br>
    <form action="admin_login.php" method="POST">
      <center> <input type="submit" name="signout" value="Sign out">
    </form>

  </body>
</html>
