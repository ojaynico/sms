<?php
/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 10/17/16
 * Time: 10:43 AM
 */
?>
<html>
<head>
    <title>Library Books</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<section id="main-content">
    <div class="inner-content">
<div class="container-fluid">
    <button title="add a book" class="btn-floating btn-small waves-effect waves-light green">
        <a href = "<?php echo base_url(); ?>book_c/bookForm"><i class="small material-icons">add</i></a></button><br>
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h4>Available Books</h4>
        </div>
    </div>
    <div class="ibox-content">
<table class="table table-striped table-hover dataTables-example">
    <thead class="btn-primary">
    <tr>
        <th>Book ID</th>
        <th>Book title</th>
        <th>Course</th>
        <th>Author</th>

        
        <th>Operations</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1; foreach ($books as $b) {?>
    <tr>
        
        <td><?php echo $b->ID; ?></td>
        <td><?php echo $b->book_title; ?></td>
        <td><?php echo $b->course ?></td>
        <td><?php echo $b->author; ?></td>

        
        <td class="text-center">
            <a href="<?php echo base_url(); ?>book_c/bookDetails?id=<?php echo $b->ID; ?>"><button title="View Book" class="btn-floating btn-small waves-effect waves-light green"><i class="small material-icons">visibility</i></button></a>
            <a href="<?php echo base_url(); ?>book_c/editForm?id=<?php echo $b->ID; ?>"><button title="Edit Book" class="btn-floating btn-small waves-effect waves-light green"><i class="small material-icons">mode_edit</i></button></a>
            <a  href="#modal<?php echo $i;?>" onclick="deleteBook('<?php echo $i; ?>')"><button title="Delete Book" class="btn-floating btn-small waves-effect waves-light red"><i class="small material-icons">delete</i></button></a>
            <div id="modal<?php echo $i;?>" class="modal modal-sm"  style="height: 21%">
                <div class="modal-content center-block">
                            <h6>Are you sure you want to delete <b><?php echo $b->book_title; ?></b></h6><br/>
                            <a href="book_c/deleteBook?id=<?php echo $b->ID;?>" class="modal-action waves-effect waves-green btn-flat"><button class="btn red">Ok</button></a>
                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><button class="btn green">Cancel</button></a>
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
</section>
<?php $this->load->view('dashboard/footer'); ?>
<script src="<?php echo base_url();?>plugins/js/datatables.min.js"></script>
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
    function deleteBook(i) {
        $('#modal'+i).openModal();
    }
</script>
</body>
</html>
