<html>
<title>Sai Pali Institute of Information & Technology</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
<link href="globe.png" rel="shortcut icon">
<?php
date_default_timezone_set("Asia/Calcutta");
//echo date_default_timezone_get();
?>


<?php
$conn=new PDO('mysql:host=localhost; dbname=saipali', 'root', '') or die(mysql_error());
if(isset($_POST['submit'])!=""){
  $name=$_FILES['photo']['name'];
  $size=$_FILES['photo']['size'];
  $type=$_FILES['photo']['type'];
  $temp=$_FILES['photo']['tmp_name'];
  $date = date('Y-m-d H:i:s');
  $caption1=$_POST['caption'];
  $link=$_POST['link'];
  
  move_uploaded_file($temp,"files/".$name);

$query=$conn->query("INSERT INTO upload (name,date) VALUES ('$name','$date')");
if($query){
header("location:index.php");
}
else{
die(mysql_error());
}
}
?>


<html>
<body>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>
</head>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
<?php include('dbcon.php'); ?>
<div class="section">
    <div class="container">
        <div class="row">
            <h1 class="text-center text-success">SITM Online Examination System</h1>
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4 text-right">
                <a href="../stdwelcome.php"><button class="btn-info btn-group-xs right" title="Back">Back</button></a>
            </div>
        </div>
    </div>
</div>
							 <div class="col-md-18">
	<div class="container-fluid" style="margin-top:0px;">
   <div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">


							<form method="post" action="delete.php" >
                        <table class="table table-condensed table-bordered" id="example">
                            
                            <thead class="btn-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>FILE NAME</th>
                                    <th>COURSE</th>
				                    <th>SEMESTER</th>
                                    <th>DATE</th>
                                    <th>VIEW</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							$query=mysql_query("select * from upload ORDER BY id DESC")or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['id'];
							$name=$row['name'];
							$date=$row['date'];
							?>
                              
										<tr>
										
                                         <td><?php echo $row['id'] ?></td>
                                         <td><?php echo $row['name'] ?></td>
                                         <td><?php echo $row['course'] ?></td>
                                            <td><?php echo $row['semester'] ?></td>
                                            <td><?php echo $row['date'] ?></td>
				<td>
                    <a href="<?php echo "pdfreader/web/viewer.html?file=%2Foes/theoryexam/files/".$row['name']; ?>" title="click to view"><span class="glyphicon glyphicon-book" style="font-size:20px; color:red"></span></a>
				</td>
                                </tr>
                         
						          <?php } ?>
                            </tbody>
                        </table>
						
                              
                               
								
                            </div>
          
</form>

        </div>
        </div>
        </div>
    </div>



</body>
</html>


