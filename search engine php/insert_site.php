<!DOCTYPE html>
<html>
<head>
<title>Search Engine</title>
<style type="text/css">
    body {
        background: silver;
    }
    
</style>
</head>
<body>
    <form acttion="insert_site.php" method="post" enctype="multipart/form-data">
        <table width="500" border="2" cellspacing="2" align="center">
            <tr>
                <td>Inserting new Website:</td>
            </tr> 
            
            <tr>
                <td>Site Title:</td>
                <td><input type="text" name="site_title" required/></td>
            </tr> 
            
            <tr>
                <td>Site Link:</td>
                <td><input type="text" name="site_link" required/></td>
            </tr>
            
            <tr>
                <td>Site Keywords:</td>
                <td><input type="text" name="site_keywords" required/></td>
            </tr>
            
            <tr>
                <td>Site Description:</td>
                <td><textarea cols="16" rows="8" name="site_desc" required></textarea></td>
            </tr>
            
            <tr>
                <td>Site Image:</td>
                <td><input type="file" name="site_image" required/></td>
            </tr>
            
            <tr>
                <td colspan="5" align="center"><input type="submit" name="submit" value="Submit" /></td>
            </tr>
        </table>
    </form>
</body>
</html>


<?php
    /*mysql_connect("localhost","root","b-212476");
    mysql_select_db("search");*/

    $user = "root";
    $password = "b-212476";
    $host = "localhost";
    $db_name = "search";

    $connection = new mysqli($host, $user, $password, $db_name);

    if(isset($_POST['submit'])) {
        
        $site_title = $_POST['site_title'];
        $site_link = $_POST['site_link'];
        $site_keywords = $_POST['site_keywords'];
        $site_desc = $_POST['site_desc'];
        $site_image = $_FILES['site_image']['name'];
        $site_image_tmp = $_FILES['site_image']['tmp_name'];
        
        $insert_query = "insert into sites(site_title,site_link,site_keywords,site_desc,site_image) values
        ('$site_title', '$site_link', '$site_keywords', '$site_desc', '$site_image')";
        
        move_uploaded_file($site_image_tmp, "images/{$site_image}");
        
        $run = $connection->query($insert_query);
        
        if ($run) {
            echo '<script>alert("Data Inserted")</script>';
        }
    }
?>