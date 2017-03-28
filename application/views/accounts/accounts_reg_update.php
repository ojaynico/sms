<?php ?>
<html>
<head>
    <title>accounts registration update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<div id="main-content">
<div class="container-fluid">
    
    <center>
        
        <!-- working with the card panels-->
		<!--<div class="card-panel teal lighten-2">LWASAMPIJJA LAWRENCE</div>-->
		<div class="card-panel green accent-1">
			<span class="blue-text text-darken-2"><h5>PAY FOR REGISTRATION</h5></span>
		</div>
    </center>
<br/><br/><br/><br/><br/><br/>
    <form method="POST" action="<?php echo base_url(); ?>accounts_reg/status_update">
        <!--a row of starts-->
        <div class="card-panel hoverable  lime accent-1">
        <div class="row">
            <div class="input-field col l4 m12 s12">
                <label for="name">Student Name</label>
                <input type="text" id="name" class="form-control input-lg" name="name" value="<?php if ($records) {
                    echo $records[0]->st_name;
                } ?>" readonly/>
            </div>

            <div class="input-field col l4 m12 s12">
                <?php echo form_label('telephone'); ?>
                <input type="text" id="phone" name="phone" class='validate'
                       value="<?php if ($records) {
                           echo $records[0]->st_mobile;
                       } ?>" readonly/>
            </div>
            <div class="input-field col l4 m12 s12">
                <select name="sex">
                    <option disabled="true">select gender</option>
                    <option>male</option>
                    <option>female</option>
                </select>
                <?php echo form_label('sex '); ?>
            </div>
        </div>

        <div class="row">
            <div class="input-field col l4 m12 s12">
                <select name="program">
                    <option><?php if ($records) {
                            echo $records[0]->course;
                        } ?></option>
                    <?php $query = $this->db->get('program')->result();
                    foreach ($query as $q) {
                        ?>
                        <option><?php echo $q->name; ?></option>
                    <?php } ?>
                </select>
                <?php echo form_label('program') ?>
            </div>

            <div class="input-field col l4 m12 s12">
                <?php echo form_label('amount paid in full') ?>
                <input type="number" id='amount' name='amount' class=' form-control input-lg' value="" required/>
            </div>
            <div class="input-field col l4 m12 s12">
                
                <?php //echo form_label('Date of payment'); ?>
                <input type="date" id='date' name='date' class='active' value="<?php echo date('Y-m-d'); ?>" required/>
                
            </div>
        </div>

        <!--start of row-->
        <div class="row">
            <div class="input-field col l4 m12 s12">
                <select name="method">

                    <?php $query = $this->db->get('method')->result();
                    foreach ($query as $q) {
                        ?>
                        <option><?php echo $q->name; ?></option>
                    <?php } ?>
                </select>
                <label class="active">method used</label>
            </div>

            <div class="input-field col l4 m12 s12">
                <select name="currency">
                    <option disabled selected>select currency type used</option>
                    <?php $query = $this->db->get('currency')->result();
                    foreach ($query as $q) {
                        ?>
                        <option><?php echo $q->name; ?></option>
                    <?php } ?>
                </select>
                <label class="active">choose currency used</label>
            </div>
        </div>
        <!--start of row-->
        <div class="row">
            <input type="hidden" name="upid" value="<?php echo $_REQUEST['editid']; ?>"/>
            <div class="input-field col l12 m12 s12">
                <center>
                <?php echo form_input(array('type' => 'reset', 'value' => 'reset', 'id' => 'reset', 'name' => 'reset', 'class' => 'btn  amber darken-4 btn-md')); ?>
                <?php echo form_input(array('type' => 'submit', 'value' => 'pay', 'id' => 'update', 'name' => 'update', 'class' => 'btn  brown darken-4 btn-md')); ?>

                <!--href="<?php //echo base_url();?>accounts_reg/add_payment_method"-->

                <a class="btn light-green darken-4" href="<?php echo base_url(); ?>accounts_reg/registered_students">check registered
                    students</a>
                </center>
                <!--
                <a class="btn  light-green darken-4" href="<?php //echo base_url(); ?>accounts_reg/add_currency_type">add currency type</a>

                <!-- Modal Trigger 
                <a class=" waves-effect waves-light orange btn modal-trigger" href="#modal1">add payment method</a>
                -->
                <!-- Modal Structure 
                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <?php //$this->load->view('accounts/add_method_view') ?>
                    </div>
                </div>
                -->

            </div>
        </div>
        <!--end of row-->
</div>
    </form>

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
<br/><br/><br/><br/><br/><br/>
<?php $this->load->view('dashboard/footer'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('select').material_select();
    });

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
</script>

<?php if ($this->session->tempdata('pay')) { ?>

    <script>
        var $toastContent = $('<span><?= $this->session->tempdata('pay')?></span>');
        Materialize.toast($toastContent, 5000);
    </script>

<?php } ?>

<script>
    $(document).ready(function () {
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
    });
</script>


</body>
</html>
