<?php ?>
<html>
    <head>
        <title>add currency type</title>
        <meta charset="utf-8">
        <?php $this->load->view('dashboard/css'); ?>
    </head>
    <?php $this->load->view('dashboard/header'); ?>
    <div id="main-content">
        <div class="container-fluid">
            <a href = "<?php echo base_url(); ?>accounts_reg"><i class="small material-icons">replay_10</i></a></button><br><hr>
        <div class="row">
    <div class="col s12">
     
        <form method="POST" action="<?php echo base_url();?>index.php/accounts_reg/add_currency_type" >
        <div class="row">
            <div class=" col l6 m6 s12">
                <h3>add payment method</h3>
                <label class="active"> method:</label><font color='red'><?php echo form_error('name');?></font>  <input type='text' name="name">
               <input type='submit' value="add currency type" class="btn waves-effect waves-light">
            </div> </div>
     </form>

        </div>
            </div>
        </div>
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
    </body>
</html>