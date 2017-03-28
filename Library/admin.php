<html>
    <head>
        <title>Upload Books</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/general.css"/>
        <link rel="stylesheet" type="text/css" href="css/admin.css"/>
    </head>
    <body>
    <center>
        <header>
            <img src="images/logo.png" class="logo"/>
            <div class="heading">
                SITM E-Library
            </div>
            <div style="font-size: 16pt; padding-top: 12px; color: blue; line-height: .5">
                Welcome<br/>

                <?php
                include 'php/connection.php';
                session_start();
                $s_id = $_SESSION['admin_id'];
                

                if (empty($s_id)) {
                    header('Location: index.php');
                }

                $query = "SELECT * FROM administrators WHERE ID = $s_id";
                $result = mysql_query($query);
                $admin = mysql_fetch_array($result);
                ?>

                <p><?php echo $admin['NAME']; ?></p>
                <a href="logout.php" style="background-color: green; color: white; border-radius: 10%; font-size: 20pt;">Logout</a>
            </div>
        </header>
        <hr/>
            </center>
    <center><h1>CHOOSE A COURSE</h1></center>
    <center>
        <section>
            <a href="upload_book.php?course=swe" class="swe"><p>Diploma In Software Engineering<br/>Bachelor In Computer Application</p></a>
            <a href="upload_book.php?course=ims" class="ims"><p>Diploma In Infrastructure & Management Services<br/>Bachelor of Sciences In Hardware & Networking</p></a>
            <a href="upload_book.php?course=vfx" class="vfx"><p>Diploma In Visual Effects & Animation<br/>Bachelor of Arts In Visual Effects & Animation</p></a>
            <br/>
            <a href="upload_book.php?course=swec" class="swec"><p>Certificate In Software Engineering</p></a>
            <a href="upload_book.php?course=imsc" class="imsc"><p>Certificate In Networking</p></a>
            <a href="upload_book.php?course=vfxc" class="vfxc"><p>Certificate In Motion Graphics</p></a>
            <br/>
            <a href="upload_book.php?course=webc" class="webc"><p>Certificate In Web Designing</p></a>
            <a href="upload_book.php?course=offc" class="offc"><p>Certificate In Microsoft Office</p></a>
            <a href="upload_book.php?course=ppc" class="printc"><p>Certificate In Print & Publishing</p></a>
        </section>
    </center>
</body>
</html>