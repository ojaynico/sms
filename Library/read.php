<html>
    <head>
        <title>Read Book</title>
        <style>
            .read{
                height: 100%;
                width: 100%;
            }
            
            body{
                margin: 0;
            }
        </style>
    </head>
    <body>
    <base target="_parent"/>
        <?php
        include 'php/connection.php';
        $cname = $_GET['course'];
        $fname = $_GET['filen'];
        ?>
        <div>
        <iframe class="read" src="<?php echo "pdfreader/web/viewer.html?file=%2Fbooks/" . $cname . "/" . $fname; ?>"></iframe>
        </div>
    </body>
</html>
