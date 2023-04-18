<html>
  <head>
    <meta charset="UTF-8">
     <title>Create Admin - PossumBlog</title>
        <link rel="stylesheet" href="https://unpkg.com/@sakun/system.css"/>
        <link rel="stylesheet" type="text/css" href="../css/nstyle.css">
  </head>
 	<body>
    <script src="../script/script.js"></script>

        
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


    <img src="../img/warning2.gif">
    <h2>EXTREMELY IMPORTANT </h2>
    <h1>Use this webpage once, it will create an admin user in the database, then delete it for safety. TODO: no. fix this.</h1>
    <form action="admin_create.php" method="POST">
    <a> Login: </a> <input type="text" name="login">
    <br> <a> Password: </a> <input type="password" name="pass">
    <br> <input type="submit" name="admin_login">
    </form>
<?php
if(isset($_POST['admin_login'])){
$conn = mysqli_connect(apache_getenv("POSSUMBLOGDATABASESRV"), apache_getenv("MYSQL_USER"), apache_getenv("MYSQL_PASSWORD"), apache_getenv("POSSUMBLOGDATABASE"));
$login = $_POST['login'];
$pass = $_POST['pass'];
$hash = password_hash($pass, PASSWORD_BCRYPT);
$sql = "INSERT INTO login VALUES ('$login', '$hash')";
mysqli_query($conn, $sql);
mysqli_close($conn);
}
?>
<br><br>

  </body>
</html>
