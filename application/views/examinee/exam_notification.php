<?php ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<div id="main-content">
        <div class="container-fluid">
         <nav>
			<div class="nav-wrapper white">
				<ul id="nav-mobile" class="right">
				<?php 
                                        $query = $this->db->query('SELECT * FROM examinee WHERE status=0');
                                     ?>
                                    <li><a href="" title="notification"><span class="new badge red " data-badge-caption="new students"><?php echo $query->num_rows(); ?></span></a></li>
                                         <?php 
                                        $q = $this->db->query('SELECT * FROM examinee WHERE status=1');
                                     ?>
					<li><a href="" title="complted exam"><span class="new badge red " data-badge-caption="students completed"><?php echo $q->num_rows(); ?></span></a></li>
					
				</ul>
			</div>
		</nav>
            <div class="row">
                <div class="col l12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Examination notification</h5>
                        </div>
                    
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover dataTables-example" >
            <thead class="blue">
            <tr>
            <td>Sr#</td>
            <td>student Name.</td>
            <td>Test code</td>
            <td>Test Username</td>
            <td>Computer Number</td>
            <td>Supervisor Name</td>
            <td>Status</td>
            <td>ACTION</td>
            </tr>
           </thead>			
            <tbody>
                <?php
                $i = 1;
            
                $this->db->where('status','0');
                $record = $this->db->get('examinee')->result();
                
                foreach($record as $r){
                ?>
                
                <tr class="gradeC">
               <td><?php echo $i;?></td> 
               <td><?php echo $r->name; ?></td>
               <td><?php echo $r->code; ?></td> 
               <td><?php echo $r->username; ?></td>
               <td><?php echo $r->computer; ?></td> 
               <td><?php echo $r->supervisor; ?></td>
               <td><?php echo 'not completed';?></td>
               <td>
                 <!-- Modal Trigger -->
                 <a title="click to remove student incase he/she has completed the exam" class=" modal-trigger btn-floating btn-small waves-effect waves-light red z-depth-5" href="#modal1"><i class="small material-icons">verified_user</i></a>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
       <h4>
            Are you sure this student has completed the examination?.
            If so, may you please click the <font color="red">complete</font> button below to accomplish the actions.
        </h4>
   
        <form action="<?php echo base_url();?>examinee/status_update" method="post">
            <input type="hidden" name="status" value="1">
            <input type="hidden" name="upid" value="<?php echo $r->id; ?>">
           <input type="submit" class="  waves-effect waves-green btn" value="complete" name="update">
       <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">cancel</a>
        </form>
    </div>
  </div>
               </td> 
              
               </tr>
            <?php $i++; } ?>
            </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>
<script src="<?php echo base_url(); ?>plugins/js/datatables.min.js"></script>
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
  <script type="text/javascript">
      $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
 </script>
 
 <?php if($this->session->tempdata('status')){?>
 <script>
     var $toastContent = $('<span><?= $this->session->tempdata('status')?></span>');
     Materialize.toast($toastContent, 5000);
 </script>     
 <?php } ?>
 
</body>
</html>