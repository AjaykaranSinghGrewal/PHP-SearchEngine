<!DOCTYPE html>
<html>
<head>
<title>Result</title>
<style>    
</style>
</head>
<body>
    <form action="result.php" method="get">
        <input type="text" name="user_keyword" size="80" />
        <input type="submit" name="result" value="Search" />
        <button><a href="search.html">Go Back</a></button>
    </form>  
    <?php
    
        $user = "root";
        $password = "b-212476";
        $host = "localhost";
        $db_name = "search";

        $connection = new mysqli($host, $user, $password, $db_name);
    
    
        if(isset($_GET['search'])) {
            $get_value = $_GET['user_query'];
            
            if ($get_value == '') {
                echo "<center><b>Invalid Search</b></center>";
                exit();
            }
            
            
            $result_query = "select * from sites where site_keywords LIKE '%$get_value%'";
            $run = $connection->query($result_query);
            
            if(mysqli_num_rows(($run)) < 1){
                echo "<center><b>Oops! Nothing found</b></center>";
                exit();
            }
            
            while($row_result = $run->fetch_array()) {
                
                $site_title = $row_result['site_title'];
                $site_link = $row_result['site_link'];
                $site_desc = $row_result['site_desc'];
                $site_image = $row_result['site_image'];
            
            echo "<div class='results'>
            
                    <h2>$site_title</h2>
                    <a href='$site_link' target='_blank'>$site_link</a>
                    <p align='justify'>$site_desc</p>
                    <img src='images/$site_image' width='100' height='100' />
                    
                </div>";
                
            }
        }
    ?>
    
</body>
</html>