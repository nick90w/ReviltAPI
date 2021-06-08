    <?php
    //FiLE CAN BE DELETED NO USE FOR IT ANYMORE

    setcookie("LogoutTimer", "A", 0, '/');

        while(isset($_COOKIE['LogoutTimer']))
        {
             if(!isset($_COOKIE["LogoutTimer"]))
             {
                  header("Location: deleteSession.php");
                  exit;
             }
         
        }

    ?>