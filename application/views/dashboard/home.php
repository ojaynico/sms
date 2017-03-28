<?php
/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 11/21/16
 * Time: 2:18 PM
 */
?>
<html>
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<section id="content">
    <div class="container">
        <div class="panel-heading">
            <h1><span class="panel-title">Home</span></h1>
        </div>
<div class="card-stats">
                        <div class="row">
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="center-align card-content blue white-text">
                                        <span><i class="mdi mdi-24px mdi-account-multiple"></i></span>
                                        <h4 class="card-stats-number"><?php echo $diploma; ?></h4>
                                    </div>
                                    <div class="blue darken-2">
                                        <a href="" style="font-size: 13pt">
                                        <div id="clients-bar" class="center-align white-text">
                                            Diploma Students
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="center-align card-content pink lighten-1 white-text">
                                        <span><i class="mdi mdi-24px mdi-account-multiple"></i></span>
                                        <h4 class="card-stats-number"><?php echo $certificate; ?></h4>
                                    </div>
                                    <div class="pink darken-2">
                                        <a href="" style="font-size: 13pt">
                                        <div id="invoice-line" class="center-align white-text">
                                            Certificate Students
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="center-align card-content blue-grey white-text">
                                        <span><i class="mdi mdi-24px mdi-account-star-variant"></i></span>
                                        <h4 class="card-stats-number"><?php echo $trainer; ?></h4>
                                    </div>
                                    <div class="blue-grey darken-2">
                                        <a href="" style="font-size: 13pt">
                                        <div id="profit-tristate" class="center-align white-text">
                                            Trainers
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="center-align card-content purple white-text">
                                        <span><i class="mdi mdi-24px mdi-book-open-variant"></i></span>
                                        <h4 class="card-stats-number"><?php echo $books; ?></h4>
                                    </div>
                                    <div class="purple darken-2">
                                        <a href="" style="font-size: 13pt">
                                        <div id="sales-compositebar" class="center-align white-text">
                                            Books
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    </div>
</section>
<?php $this->load->view('dashboard/footer'); ?>
</body>
</html>
