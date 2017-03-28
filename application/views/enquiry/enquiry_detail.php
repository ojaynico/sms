<?php ?>
<html>
    <head>
        <title>Enquiry form</title>
        <meta charset="utf-8">
        <?php $this->load->view('dashboard/css'); ?>
    </head>
    <?php $this->load->view('dashboard/header'); ?>
    <div id="main-content">
        <div class="container-fluid">
            <button title="Back" class="btn-floating btn-small waves-effect waves-light green">
                <a href = "<?php echo base_url(); ?>enquiry_c/show"><i class="small material-icons">fast_rewind</i></a></button>
       <h4>Enquiry Details</h4>

      <form method="POST" action="<?php echo base_url();?>enquiry_c/detailed_data" class="card">
      <!-- <form action="enquiry_c" method="post">-->
        <?php if(isset($message)){?><center><h3 style="color:green;">Data updated successfully</h3></center><br><?php }?>
        
        <!--a row of starts-->
        <div class="row">
        <div class="input-field col s4">
        <?php echo form_label('Your name here');?>
            <span color="red"><?php echo form_error('st_name'); ?></span>
        <input type="text" id="st_name"  class="validate" length="30" value="<?php if($records){echo $records[0]->st_name;}?>" name="st_name" readonly/>
       </div>
            
        <div class="input-field col s4">
        <?php echo form_label('Your telephone');?>
            <span color="red"><?php echo form_error('smobile'); ?></span>
        <input type="text"id="smobile" name="smobile" class='form-control input-lg' length='10'value="<?php if($records){echo $records[0]->st_mobile;}?>" readonly/>
        </div>
        <div class="input-field col s4">  
        <?php echo form_label('Enter your address ');?><span color="red"><?php echo form_error('saddress'); ?></span>
        <input type="text" id='saddress' name='saddress' class='form-control input-lg'value="<?php if($records){echo $records[0]->st_address;}?>" readonly/>
        </div></div>
            
        <div class="row">
        <div class="input-field col s4">
        <?php echo form_label('Guardian name')?>
        <input type="text" id='pname' name='pname' class='form-control input-lg'value="<?php if($records){echo $records[0]->g_name;}?>" readonly/>
        </div>
             
        <div class="input-field col s4">
        <?php echo form_label('email')?>
            <span color="red"><?php echo form_error('email'); ?></span>
        <input type="email" id='email' name='email' class='form-control input-lg'value="<?php if($records){echo $records[0]->st_email;}?>" readonly/>
        </div>
        <div class="input-field col s4">
        <?php echo form_label('Guardian mobile');?>
        <input type="text" id='pmobile' name='pmobile' class='form-control input-lg'length='10'value="<?php if($records){echo $records[0]->g_mobile;}?>" readonly/>
        </div></div>
          
        <!--start of a row-->
        <div class="row">
        <div class="input-field col s4">
        <?php echo form_label('What is your reason being with us?');?>
            <span color="red"><?php echo form_error('reason'); ?></span>
        <input type="text" id='reason' name='reason' class='form-control input-lg'value="<?php if($records){echo $records[0]->reason;}?>" readonly/>
        </div>
            
        <div class="input-field col s4">
        <?php echo form_label('Qualification');?>
        <input type="text" id='qual' name='qual' class='form-control input-lg'value="<?php if($records){echo $records[0]->qualification;}?>" readonly/>
        </div>
        <div class="input-field col s4">
        <?php echo form_label('Former school/company');?>
            <span color="red"><?php echo form_error('school'); ?></span>
        <input type="text" id='school' name='school' class='form-control input-lg'value="<?php if($records){echo $records[0]->f_company;}?>" readonly/>
        </div></div>
        <!--end of a row--> 

         <!--start of row-->
        <div class="row">
            <div class="input-field col s4">
        <?php echo form_label('Pre computer knowledge');?>
        <input type="text" id='knowledge' name='knowledge' class='form-control input-lg'value="<?php if($records){echo $records[0]->p_knowlegde;}?>" readonly/>
        </div>
            
        <div class="input-field col s4"> 
          <!-- working on the selection field-->
    <br/><br/><input name="course" value="<?php if($records){echo $records[0]->course;}?>" readonly/>
        
    <label>which program are you interested in?</label>
 
        <!--<input type="text" id='course' name='course' class='form-control input-lg'>-->
        </div>       
            <div class="input-field col s4">
                                    
            <label for="date">Date of enquiry:</label><br/><br/>
             <input value="<?php if($records){echo $records[0]->date;}?>" id="date" name="date" readonly/>
                                    </div></div>
          <!--end of row-->
        
           <!--start of row-->
        <div class="row">
        <div class="input-field col s4"></div> <div class="input-field col s4"></div>
        </div>
           <!--end of row-->
           
           <input type="hidden" name="upid" value="<?php if($records){echo $records[0]->id;}?>"/>
        </form>
        <?php //echo form_close()?>
        </div>
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