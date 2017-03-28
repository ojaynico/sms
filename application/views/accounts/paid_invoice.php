<?php ?>
<html>

    <head>
        <title>paid invoices</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <LINK REL="SHORTCUT ICON" HREF="<?php echo base_url();?>images/logo.JPG" />
        <?php $this->load->view('dashboard/css'); ?>
    </head>
      
     <?php $this->load->view('dashboard/header'); ?>
 
        
            <div class="card-panel hoverable ">
		<span class="blue-text text-darken-2 "><center><strong>Click print receipt button to print student payment receipt.</strong>
                        <input type="button" onclick="printDiv('printableArea')" value="print student receipt!" class="btn orange"/></center>
                </span>
            </div>
        <div class="container">
        <div class="card-panel hoverable z-depth-5" id="printableArea">
        <center>
            <p><img class="responsive-img" src="<?php echo base_url();?>images/logogo.JPG"></p>
            <p>Kibuga, Block 4, Plot 887, Namirembe, Kampala, Uganda(E. Africa)Ph. No. +256 -414257526/31</p>
        </center>
        
        Creation Date:  <strong><?php if($records){echo $records[0]->creation_timestamp;}?></strong><br>
        Title:  <strong><?php if($records){echo $records[0]->title;}?></strong><br>
        Description:  <strong><?php if($records){echo $records[0]->description;}?></strong><br>
        Status:  <strong>fully paid</strong>
            
        <center>RECEIPT NO: <strong><?php if($records){echo $records[0]->invoice_id;}?></strong></center>
        
        <p> Received with Thanks from:  <strong><?php if($records){echo $records[0]->student_id;}?></strong></p>
       <p>A sum of Shillings:  <?php if($records){echo $records[0]->amount;}?></p>
           <strong>
               <p id="demo">th result is</p>
                <script> 
                    var c = <?php if($records){echo $records[0]->amount;}?>;
                    document.getElementById("demo").innerHTML = "Amount in words: " + inWords(c);
                </script>
           </strong>
       
       <p>On account of:  <strong><?php if($records){echo $records[0]->title;}?> </strong></p>
       <p>By Cash/Cheque/D.D. No.  <strong><?php if($records){echo $records[0]->payment_method;}?> </strong></p>
        
    </div>   
        </div>        
         
        
    
               <?php //if($records){echo $records[0]->amount;}?>
              
              

<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
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

       <?php $this->load->view('dashboard/footer'); ?>  
     
       <script>
         var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

function inWords (num) {
    if ((num = num.toString()).length > 9) return 'overflow';
    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    if (!n) return; var str = '';
    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
    str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
    str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
    return str;
}
 var c = <?php if($records){echo $records[0]->amount;}?>;
document.getElementById("demo").innerHTML = inWords(c);
</script>   
    </body>
</html>