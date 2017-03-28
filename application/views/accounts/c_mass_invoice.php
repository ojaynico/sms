<html>
    <head>
        <title>Creating mass invoice</title>
        
        <LINK REL="SHORTCUT ICON" HREF="http://localhost/staff/title_icon/saipalilogo.jpg" />
        
        <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
          <link href="http://localhost/simpleCRUD/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/simpleCRUD/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="http://localhost/simpleCRUD/assets/css/datatables.min.css" rel="stylesheet">
    <link href="http://localhost/simpleCRUD/assets/css/style.css" rel="stylesheet">  
    <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
           <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
 
 
  <!--
  
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/datatables.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  -->
  
        
    </head>
    <body>
          <br><br>
        <div class="container">
            <div class="row">
    <div class="col s6">
      
      
         <a title="create a single invoice" class="btn waves-effect waves-light" href="http://localhost/staff/accounts">Create Single Invoice</a>
  
        <a title="create multiple invoices" class="btn waves-effect waves-light" href="http://localhost/staff/accounts/mass_invoice">Create Mass Invoice</a>
     
            
        <form>
            class:
            <select>
                <option>DSE001</option>
                 <option>DSE002</option>
                  <option>DSE003</option>
                   <option>VFX001</option>
                    <option>VFX002</option>
                     <option>VFX003</option>
                      <option>VFX004</option>
                       <option>IMS001</option>
                        <option>IMS002</option>
                         <option>IMS003</option>
                        <option>IMS004</option>
                         <option>IMS005</option>
                        <option>IMS006</option>
                         <option>IMS007</option>
                        <option>IMS008</option>
            </select>
            
            Title:<input type="text">
            Description:<input type="text">
            Total:<input type="number">
            Payment:<input type="number">
            Status:
            <select>
                 <option>paid</option>
                 <option>unpaid</option>
            </select>
            
            method:
            <select>
                 <option>Cash</option>
                 <option>Cheque</option>
                 <option>Paypal</option>
                 <option>western Union</option>
                 <option>Bank</option>
                 <option>Mobile Money</option>
            </select>
            
            date:<input type="date" class="datepicker">
            
            <input type="submit" value="add invoices" class="btn waves-effect waves-light">
        </form>
      </div> 
            
           
            <div class="col s6">
           
              <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <label> <h5>Students</h5></label>
                           
                        </div>
                    
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example"" >
            <thead class="btn-primary">
            <tr>
            
            <td>Roll No.</td>
            <td>check</td>
            <td>Student Name</td>
            
            </tr>
           </thead>			
            <tbody>
               
                <tr class="gradeC">
               <td>1</td> 
               <td> <input type="checkbox" id="law">
                    <label for="law"></label>
               </td>
               <td>LWASAMPIJJA LAWRENCE</td>
               
               </tr>
               <tr class="gradeC">
               <td>2</td> 
               <td><input type="checkbox" id="david">
                    <label for="david"></label></td>
               <td>SSIMBWA DAVID</td>
               </tr>
           
                <tr class="gradeC">
               <td>3</td> 
               <td><input type="checkbox" id="james">
                    <label for="james"></label></td>
               <td>MUGUME JAMES</td>
               </tr>
               
                <tr class="gradeC">
               <td>4</td> 
               <td><input type="checkbox" id="ojwee">
                    <label for="ojwee"></label></td>
               <td>OJWEE NICODEMUS</td>
               </tr>
               
                <tr class="gradeC">
               <td>5</td> 
               <td><input type="checkbox" id="namata">
                    <label for="namata"></label></td>
               <td>NAMATA MADRINE</td>
               </tr>
           
            </tbody>
         
                                </table>
                            </div>

                        </div>
                    </div>
            
          
            </div>
            
        </div>
            
<script src="http://localhost/simpleCRUD/assets/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="http://localhost/simpleCRUD1/js/materialize.min.js"></script>
<script src="http://localhost/simpleCRUD/assets/js/bootstrap.min.js"></script>
<script src="http://localhost/simpleCRUD/assets/js/datatables.min.js"></script>


<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                    }
                }
            ]

        });


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
        
         <!--Import jQuery before materialize.js-->
     
    
         <script type="text/javascript">
          $(document).ready(function() {
    $('select').material_select();
  });
  
   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
  </script>
    </body>
</html>


