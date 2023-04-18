# website
[![forthebadge](https://forthebadge.com/images/badges/fuck-it-ship-it.svg)](https://forthebadge.com)
[![forthebadge](https://forthebadge.com/images/badges/0-percent-optimized.svg)](https://forthebadge.com)
[![forthebadge](https://forthebadge.com/images/badges/ctrl-c-ctrl-v.svg)](https://forthebadge.com)
[![forthebadge](https://forthebadge.com/images/badges/it-works-why.svg)](https://forthebadge.com)


Source code for the PossumBlog CMS.

# Setting up
As of the development phase, use XAMPP to set up and test PossumBlog.

Edit httpd-vhosts.conf for your Apache installation and add the following lines


    SetEnv  POSSUMBLOGDATABASESRV "MySQL Server goes here"
    SetEnv  MYSQL_USER     "MySQL user goes here"
    SetEnv  MYSQL_PASSWORD "User password goes here"
    SetEnv  POSSUMBLOGDATABASE "website" (i suggest keeping this line as it is)
These environment variables are required. The user should have full perms to the PossumBlog database.

Now, copy the folder website-main into htdocs. You can rename it to website for simplicity. 

Next up, import the database into MySQL, located in /database/website.sql, the script will create a database named "website". The db contains a user admin with a password "zaq1@WSX" used for testing. The admin_create.php file under possumadmin can also create a user, and should be deleted should you want to put PossumBlog online (you shouldn't at the moment)

Now navigate to localhost/website/blog.php, and you should see placeholder posts, one includes an image. If you see this - PossumBlog has been set up correctly.

From now you can navigate to /localhost/website/admin_login.php and log in to the test account. 

**IMPORTANT** There needs to be a lot more work done to consider PossumBlog ready for release.
