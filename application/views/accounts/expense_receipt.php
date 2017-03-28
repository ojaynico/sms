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
            <h6><strong>CASH VOUCHER</strong></h6>
        </center>
        <div class="row">
            <div class="card-panel col l6 m6 s6">
                Creation Date:  <strong><?php if($recordup){echo $recordup[0]->timestamp;}?></strong>
            </div>
            <div class="card-panel col l6 m6 s6">
                 &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp;Sr. No: <strong><?php if($recordup){echo $recordup[0]->payment_id;}?></strong>
            </div>
        </div>
        <p>Payment to: &emsp;&emsp; <strong><?php if($recordup){echo $recordup[0]->title;}?></strong></p>
        <p>Address: &emsp;&emsp;&emsp;&nbsp;&nbsp; <strong>SaiPali Institute of Technology and Management</strong></p>
        
        <table border="1">
            <tr>
                <th>Sr.No</th>
                <th>Details of Expenses</th>
                <th>Amount(UGX)</th>
            </tr>
            <tr>
                <td><strong><?php if($recordup){echo $recordup[0]->payment_id;}?></strong></td>
                <td><strong><?php if($recordup){echo $recordup[0]->description;}?></strong></td>
                <td><strong><?php if($recordup){echo $recordup[0]->amount;}?></strong></td>
            </tr>
        </table>
       Amount in words:  
       <strong><p id="demo">th result is</p></strong> 
     
            <script> 
                
                var c = <?php if($recordup){echo $recordup[0]->amount;}?>;
                document.getElementById("demo").innerHTML = "Amount in words: " + inWords(c);
            </script>
       
       
       <p>By Cash/Cheque/D.D. No.  <strong><?php if($recordup){echo $recordup[0]->method;}?> </strong></p>
       <p>Signitures:</p>
       
       <div class="row">
            <div class="col l2 m2 s2">
               <input type="text">
                Prepared by
            </div>  
            <div class="col l2 m2 s2"> 
               <input type="text">
               Accountant
            </div>
            <div class="col l2 m2 s2">
               <input type="text">
               Principal
            </div>   
            <div class="col l2 m2 s2">   
               <input type="text">
               Director
            </div>
            <div class="col l2 m2 s2">
               <input type="text">
               Received by
            </div>    
       </div>
        
    </div>   
</div>  
               <?php //if($recordup){echo $recordup[0]->amount;}?>
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
              
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
          
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
 var c = <?php if($recordup){echo $recordup[0]->amount;}?>;
document.getElementById("demo").innerHTML = inWords(c);
</script>
    </body>
</html>