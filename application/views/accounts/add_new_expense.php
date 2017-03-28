<html>
    <head>
        <title>add new expense</title>
        <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <LINK REL="SHORTCUT ICON" HREF="http://localhost/staff/title_icon/saipalilogo.jpg" />
       
        <?php $this->load->view('dashboard/css'); ?>
    </head>
     <?php $this->load->view('dashboard/header'); ?>
        <div class="container">
        
    <hr>
        <form method="POST" action="<?php echo base_url();?>index.php/accounts/expense" >
        <div class="row">
            <div class=" col l12 m12 s12">
               
                Title <font color="red"><?php echo form_error('title'); ?></font> <input type='text' name="title">
            </div></div>   
            
            <div class="row">
            <div class=" col l12 m12 s12"> 
                <label>Category</label>
                <font color="red"><?php echo form_error('category'); ?></font> 
                <select name="category"  >
                              <option value="">select</option>
                              <?php $categories = $this->db->get('expense_category')->result_array();
                                    foreach($categories as $row):
			      ?>
                            		<option value="<?php echo $row['expense_category_id'];?>" name="category"> <?php echo $row['name'];?> </option>
                                <?php   endforeach; ?>
                </select>
                  
            </div></div>
            
             <div class="row">
            <div class=" col l12 m12 s12">
                Method      <font color="red"><?php echo form_error('method'); ?></font>      <input type="text" name="method">
            </div></div>
                
             <div class="row">
            <div class=" col l12 m12 s12">
                Amount      <font color="red"><?php echo form_error('amount'); ?></font>      <input type="text" name="amount">
            </div></div>
                
            
             <div class="row">
            <div class=" col l12 m12 s12">
                Description<input type="text" name="description">
            </div></div>
                
             <div class="row">
            <div class=" col l12 m12 s12">
                Date      <font color="red"><?php echo form_error('date'); ?></font>      <input type="date" name="date"class="datepicker">
            </div></div>
            
                 <div class="row">
            <div class=" col l12 m12 s12">
                <input type="submit" value="add expense" class="btn waves-effect waves-light">
                <input type="reset" class="btn waves-effect waves-light">
                <a href="create_expense_category" class="btn waves-effect waves-light">New Expense Category</a>
            </div></div>
        </form>
        
        <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="http://localhost/simpleCRUD1/js/materialize.min.js"></script>
      <script type="text/javascript">
          $(document).ready(function() {
    $('select').material_select();
  });
  /*
   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
  */
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
     <?php $this->load->view('dashboard/footer'); ?>      
    </body>
</html>