<html>
    <head>
        <title>create new expense category</title>
         <LINK REL="SHORTCUT ICON" HREF="http://localhost/staff/title_icon/saipalilogo.jpg" />
       
        
        <meta charset="utf-8">
        <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="http://localhost/simpleCRUD/css/materialize.min.css"  media="screen,projection"/>
      
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
    </head>
    <body>
        <div class="container">
            <a href = "<?php echo base_url(); ?>"><i class="small material-icons">replay_10</i></a></button><br><hr>
        <div class="row">
    <div class="col s12">
     
        <form method="POST" action="<?php echo base_url();?>index.php/accounts/create_expense_category" >
        <div class="row">
            <div class=" col l6 m6 s12">
                <h3>Invoice Informations</h3>
                Expense Category: <font color="red"> <?php echo form_error('total'); ?></font> <input type='text' name="name">
               <input type='submit' value="add expense category" class="btn waves-effect waves-light">
            </div> </div>
     </form>
        
         <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
     <script type="text/javascript" src="http://localhost/simpleCRUD/js/materialize.min.js"></script>
        <script>
             $(document).ready(function(){
    $('ul.tabs').tabs();
  });
    
            
        $(document).ready(function(){
    $('ul.tabs').tabs('select_tab', 'tab_id');
  });
         
          $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
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
            
    </body>
</html>