<html>
    <head>
        <title>School Accounts</title>
    
        <LINK REL="SHORTCUT ICON" HREF="http://localhost/staff/title_icon/saipalilogo.jpg" />
        
        
        <meta charset="utf-8">
        <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="http://localhost/simpleCRUD/css/materialize.min.css"  media="screen,projection"/>
      
  <meta name="viewport" content="width=device-width, initial-scale=1">
        
  <style>
    /* Below line is used for online Google font */
@import url(https://fonts.googleapis.com/css?family=Raleway);
h2{
background-color: #FEFFED;
padding: 30px 35px;
margin: -10px -50px;
text-align:center;
border-radius: 10px 10px 0 0;
}
span{
display: block;
margin-top: 10px;
font-weight:bold;
}
b{
color:red;
}
.back{
text-decoration: none;
border: 1px solid rgb(0, 143, 255);
background-color: rgb(0, 214, 255);
padding: 3px 20px;
border-radius: 2px;
color: black;
}
center{
font-size: 31px;
}
hr{
margin: 10px -50px;
border: 0;
border-top: 1px solid #ccc;
margin-bottom: 25px;
}
div.container{
width: 900px;
height: 610px;
margin:35px auto;
font-family: 'Raleway', sans-serif;
}
div.main{
width: 306px;
padding: 10px 50px 0px;
border: 2px solid gray;
border-radius: 10px;
font-family: raleway;
float:left;
margin-top: 30px;
}
input[type=text]{
width: 100%;
height: 40px;
padding: 5px;
margin-bottom: 25px;
margin-top: 5px;
border: 2px solid #ccc;
color: #4f4f4f;
font-size: 16px;
border-radius: 5px;
}
input[type=radio]{
margin: 10px 10px 0 10px;
}
label{
color: #464646;
text-shadow: 0 1px 0 #fff;
font-size: 14px;
font-weight: bold;
}
input[type=submit]{
font-size: 16px;
background: linear-gradient(#ffbc00 5%, #ffdd7f 100%);
border: 1px solid #e5a900;
color: #4E4D4B;
font-weight: bold;
cursor: pointer;
width: 100%;
border-radius: 5px;
padding: 10px 0;
outline:none;
}
input[type=submit]:hover{
background: linear-gradient(#ffdd7f 5%, #ffbc00 100%);
}
</style>
  
    </head>
    
    
    
    <body>
        <div id="loaddi" class="container">
            
            <h3>Accounts Today</h3>
        Date:<?php echo date('Y-m-d H:i:s');?> <?php echo br(3)?>
        <span>Form will automatically submit in <b id="timer">20</b> <b>seconds</b>.</span>
        <form action="" method="POST" id="form">
        <!--Calculating the amount of money the school has received without expenses-->
        <?php 
        $this->db->select_sum('amount_paid');
        $query = $this->db->get('invoice')->row();
        ?>
        
        <!--Calculating the amount of money the school has received today-->
        <?php
        $this->db->select_sum('amount');
        $this->db->where('payment_type','income');
        $this->db->where('timestamp','CURDATE()',FALSE);
        $ic = $this->db->get('payment')->row();
        ?>
    <div class="row">
    <div class="input-field col s6">
       <label> Money in school Today:</label>
       <input type="text" value="<?php echo $ic->amount;?>" readonly name="in" id="in" placeholder="0000">
    </div></div>
        
        <!--Calculating the expenses the school has made today-->
        <?php 
        $this->db->select_sum('amount');
        $this->db->where('payment_type','expense');
        $this->db->where('timestamp','CURDATE()',FALSE);
        $e = $this->db->get('payment')->row();
        ?>
    <div class="row">
    <div class="input-field col s6">
        <label>Expenses of Today:</label>
        <input type="text" value="<?php echo $e->amount?>" readonly name="out" id="out" placeholder="0000">
    </div></div>
        
        <!--Calculating the amount of expenses the school has made since-->
        <?php 
        $this->db->select_sum('amount');
        $this->db->where('payment_type','expense');
       
        $ex = $this->db->get('payment')->row();
        ?>
    <div class="row">
    <div class="input-field col s6">   
        <!-- Calculating the amount of money in school currently.-->
        <label>Bank balance:</label>
        <input type="text" value=" <?php echo $query->amount_paid - $ex->amount;?> " readonly name="balance" id="balance">
    </div></div>  
        
        <input type="button" value="change currency">
        </form>
        
        </div>
        
          <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="http://localhost/simpleCRUD1/js/materialize.min.js"></script>
      <script type="text/javascript">
          $(document).ready(function() {
    $('select').material_select();
  });
  
  
  </script>
        </div>
        
        <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red">
              <i class="large material-icons">mode_edit</i>
            </a>
            <ul>
              <li><a title="pay here" class="btn-floating red" href="<?php echo base_url(); ?>accounts"><i class="material-icons">insert_chart</i></a></li>
              <li><a title="view payment history"class="btn-floating yellow darken-1" href="<?php echo base_url(); ?>accounts/paid"><i class="material-icons">view_list</i></a></li>
              <li><a title="see and add expenses" class="btn-floating green" href = '<?php echo base_url(); ?>accounts/expenses' ><i class="material-icons">receipt</i></a></li>
              <li><a title="see expense categories"class="btn-floating blue" href = '<?php echo base_url();?>accounts/show_expense_category' ><i class="material-icons">attach_file</i></a></li>
            </ul>
        </div>
        
        <script type="text/javascript">
        
        window.onload = function() {
// Onload event of Javascript
// Initializing timer variable
var x = 20;
var y = document.getElementById("timer");
// Display count down for 20s
setInterval(function() {
if (x <= 21 && x >= 1) {
x--;
y.innerHTML = '' + x + '';
if (x == 1) {
x = 21;
}
}
}, 1000);
// Form Submitting after 20s
var auto_refresh = setInterval(function() {
submitform();
}, 20000);
// Form submit function
function submitform() {
if (validate()) // Calling validate function
{
alert('Form is submitting.....');
document.getElementById("form").submit();
}
}
// To validate form fields before submission
function validate() {
// Storing Field Values in variables
var in = document.getElementById("in").value;
var out = document.getElementById("out").value;
var balance = document.getElementById("balance").value;

// Conditions
if (in != '' && out != '' && balance != '') {

alert("All fields are required.....!");


}
};
        
        </script>
        
        <script>
var auto_refresh = setInterval(
function()
{
 $.ajaxSetup({ cache: false });
$('#loaddiv').empty().load(window.location.href);
}, 1000);
</script>

        
    </body>
    
</html>