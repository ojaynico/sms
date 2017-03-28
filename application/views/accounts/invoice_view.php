<!Doctype html>

<html>
    <head>
        <title>Student payment invoice</title>
        
        <meta charset="utf-8">
        <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="http://localhost/simpleCRUD/css/materialize.min.css"  media="screen,projection"/>
      
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  -->
  
  <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}

div {
   
    border-width: 2px;
      background-color: light;
}
.container{
    border-style: solid ;
    border-width: 1px;
}
</style>
    </head>
    <body>
        <div class="container">
       
       <br/><br/>
     <!--a row of starts-->
        <div class="row">
        <div class="input-field col l6 m6 s12"></div>
            
        <div class="input-field col l6 m6 s12">
       Creation Date:<?php if($records){echo $records[0]->timestamp;}?><br>
       Title:<?php if($records){echo $records[0]->title;}?><br>
       Description:<?php if($records){echo $records[0]->description;}?><br>
       Status:
        </div></div>
     <!--a row ends here-->
     <div> </div>
     <!--a row of starts-->
     <div class="row">
        <div class="input-field col l6 m6 s12">  
       Payment to:SAIPALI INSTITUTE OF TECHNOLOGY AND MANAGEMENT<br>
       Kampala Uganda<br>
       +256759119710<br>
        </div>
         
        <div class="input-field col l6 m6 s12">
        Bill to:<?php if($records){echo $records[0]->student_id;}?><br>
        class:<br>
        roll:<br>
        </div></div>
           
     <div class="row">
        <div class="input-field col l6 m6 s12">
        
        </div>
        <div class="input-field col l6 m6 s12">
        Total Amount:<?php if($records){echo $records[0]->amount;}?><br>
        Paid Amount:<br>
        Due:<br>
        </div></div>
          
        <!--start of a row-->
        <div class="row">
        <div class="input-field col l12 m12 s12">
       Payment History
       <table>
       <thead class="btn-primary">
            <tr>
            <th>Date</th>
            <th>Amount</th>
            <th>Method</th>
            
            </tr>
           </thead>			
            <tbody>
                <tr>
             
               <td><?php if($records){echo $records[0]->timestamp;}?></td>
               <td><?php if($records){echo $records[0]->amount;}?></td>
               <td><?php if($records){echo $records[0]->method;}?></td>
              
            </tbody>
            </table>
        </div></div>
        <!--end of a row--> 
        <!--start of row-->
        <div class="row">
        <div class="input-field col l4 m6 s12"></div> <div class="input-field col l4 m6 s12"></div>
        <div ><a class="btn-floating btn-small waves-effect waves-light green tooltipped" href="<?php echo base_url()?>index.php/accounts/payment_history" data-position="bottom" data-delay="50"  data-tooltip="back"><i class="small material-icons">fast_rewind</i>Hover me!</a>
        </div></div>
           <!--end of row-->
           
          
      
        
        <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="http://localhost/simpleCRUD1/js/materialize.min.js"></script>
      <script type="text/javascript">
          $(document).ready(function() {
    $('select').material_select();
  });
  
   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
  </script>
          
  
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
  
    </body>
</html>