<html>
<title>Sai Pali Institute of Information & Technology</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
<link href="globe.png" rel="shortcut icon">
<head>
<?php
date_default_timezone_set("Asia/Calcutta");
//echo date_default_timezone_get();
?>


<?php
$conn=new PDO('mysql:host=localhost; dbname=saipali', 'root', '') or die(mysql_error());
if(isset($_POST['submit'])!=""){

    $semester = $_POST['semester'];
    $course = $_POST['course'];

  $name=$_FILES['photo']['name'];
  $size=$_FILES['photo']['size'];
  $type=$_FILES['photo']['type'];
  $temp=$_FILES['photo']['tmp_name'];
  $date = date('Y-m-d H:i:s');

  
  move_uploaded_file($temp,"files/".$name);

$query=$conn->query("INSERT INTO upload (name,course,semester,date) VALUES ('$name','$course','$semester','$date')");
if($query){
header("location:index.php");
}
else{
die(mysql_error());
}
}
?>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
</head>
<body>
<?php include('dbcon.php'); ?>
<div class="section">
    <div class="container">
        <div class="row">
            <h1 class="text-center text-success">SITM Online Examination System</h1>
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4 text-right">
                <a href="../admin/admwelcome.php"><button class="btn-info btn-group-xs right" title="Back">Back</button></a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <form enctype="multipart/form-data"  action="" id="wb_Form1" name="form" method="post">
            <table class="table table-bordered table-responsive">
                <tr><td>File</td><td><input type="file" name="photo" id="photo" required="required" class="btn-success btn-block"></td></tr>
                <tr><td>Course</td><td>
                        <select name="course" class="btn-info btn-block">
                            <option value="VFX">VFX</option>
                            <option value="SE">SE</option>
                            <option value="IMS">IMS</option>
                            <option value="CERTIFICATE">Certificate</option>
                        </select>
                    </td></tr>
                <tr><td>Semester</td><td>
                        <select name="semester" class="btn-info btn-block">
                            <option value="I">Semester I</option>
                            <option value="II">Semester II</option>
                            <option value="III">Semester III</option>
                            <option value="IV">Semester IV</option>
                            <option value="certificate">Certificate</option>
                        </select>
                    </td></tr>
            </table>
            <input type="submit" class="btn btn-danger center-block" value="SUBMIT" name="submit">
        </form>
    </div>
    <div class="col-lg-4"></div>
</div>


							 <div class="col-md-18">
	<div class="container-fluid" style="margin-top:0px;">
   <div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
							<form method="post" action="delete.php" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-condensed table-bordered" id="example">
                            <thead class="btn-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>FILE NAME</th>
                                    <th>COURSE</th>
                                    <th>SEMESTER</th>
                                   <th>DATE</th>
				<th>VIEW EXAM</th>
				<th>REMOVE</th>
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
				<a href="<?php echo "pdfreader/web/viewer.html?file=%2Foes/theoryexam/files/".$row['name']; ?>" title="click to view"><span class="glyphicon glyphicon-book" style="font-size:20px; color:blue"></span></a>
				</td>
				<td>
				<a href="delete.php?del=<?php echo $row['id']?>"><span class="glyphicon glyphicon-trash" style="font-size:20px; color:red"></span></a>
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


