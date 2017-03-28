<?php
/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 10/17/16
 * Time: 4:00 PM
 */
?>
<html>
<head>
    <title>Book Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<section id="main-content"  style="height: 1024px">
    <div class="inner-content">
<div class="container-fluid">
    <button title="Back" class="btn-floating btn-small waves-effect waves-light green">
        <a href = "<?php echo base_url(); ?>book_c"><i class="small material-icons">fast_rewind</i></a></button>
    <center><h4>Book Details</h4></center>
    <?php foreach ($book as $b)?>
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <table class="table table-responsive">
                        <tr><th><h5 class="text-success">Book ID:</h5></th><td><h5><?php echo $b->ID; ?></h5></td></tr>
                        <tr><th><h5 class="text-success">Book Name:</h5></th><td><h5><?php echo $b->book_title; ?></h5></td></tr>
                        <tr><th><h5 class="text-success">Book Author:</h5></th><td><h5><?php echo $b->author; ?></h5></td></tr>
                         <tr><th><h5 class="text-success">Book Description:</h5></th><td><h5><?php echo $b->description; ?></h5></td></tr>
                    </table>
                </div>
                <div class="col-lg-2"></div>
            </div>
</div>
    </div>
</section>
<?php $this->load->view('dashboard/footer'); ?>
</body>
</html>