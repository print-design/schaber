<?php
include 'include/topscripts.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'include/head.php';
        ?>
    </head>
    <body>
        <?php
        include 'include/header.php';
        ?>
        <div class="container">
            <?php
            if(!empty($error_message)) {
               echo "<div class='alert alert-danger mt-3'>$error_message</div>";
            }
            ?>
            <h1><?=SITENAME ?></h1>
        </div>
        <?php
        include 'include/footer.php';
        ?>
    </body>
</html>