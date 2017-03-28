
<?php ?>

<html>
    <head>
        <title>Expense Category Update</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <LINK REL="SHORTCUT ICON" HREF="http://localhost/staff/title_icon/saipalilogo.jpg" />
        <?php $this->load->view('dashboard/css'); ?>
    </head>
        <?php $this->load->view('dashboard/header'); ?>
    <br><br><br><br><br><br><br><br>
        <div class="container">
            <a href="http://[::1]/sms/accounts/show_expense_category">expense categories</a>
       
            <form method="POST" action="<?php echo base_url();?>index.php/accounts/updated_data">
                <div class="card-panel hoverable z-depth-5  teal lighten-1">
                    <h5>Update Expense Category</h5>
                    <?php echo form_label('Expense categories here');?></br><font color="red"><?php echo form_error('name'); ?></font></br>
                    <input type="text" id="name"  class="validate" length="30" value="<?php if($records){echo $records[0]->name;}?>" name="name"/>
                    <input type="submit" name="update" value="Update" class="btn green" id="update">
                    <input type="reset" class="btn orange">
                    <input type="hidden" name="upid" value="<?php if($records){echo $records[0]->expense_category_id;}?>"/>
                </div>
                <br><br><br><br><br><br><br><br><br><br>
            </form>
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