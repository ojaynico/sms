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
    <title>Print Admission Letter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<div id="main-content">
    <div class="container-fluid" id="printLetter">
        <?php foreach ($student as $s)?>
        <?php if ($_GET['type'] == 1){ ?>
            <div class="row">
                <div class="col l12 right-align"><h6>Date: <?php echo date("Y-m-d"); ?></h6></div>
            </div>
            <br/>
            <div class="row">
                <div class="col l12">
                    <h5><u>Re: PROVISIONAL ADMISSION</u></h5>
                    <h5><?php if ($s->sex == "Male") echo "Mr"; else echo "Mrs"; ?>. <?php echo $s->s_name; ?></h5>
                    <h5>Dear, <?php echo $s->s_name; ?></h5>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col l12">
                    <p>
                        We are very pleased to advise you that we are prepared to admit you as a certificate candidate in
                        <b>
                            <?php
                            $query = $this->db->query("SELECT name FROM courses WHERE id = $s->course");
                            $result = $query->result();
                            foreach ($result as $r)
                                echo $r->name;
                            ?>
                        </b>
                        program for the session commencing February. Admission to our program is very competitive and we scrutinize each application carefully. We believe that a stimulating, intellectual discussion between students and faculty is a necessary ingredient of a successful graduate program. We have recommended that the Faculty admit you because we think that you will be able to make an important contribution to this research dialogue. In turn, we hope that the personal supervision we offer, together with the collegial atmosphere of our students, will combine to make your stay here very rewarding - personally, academically and professionally.
                    </p>
                    <p>
                        We hope you decide to join us and we look forward to hearing from you as to your plans.
                    </p>
                    <br/><br/>
                    <p>
                        Yours truly,
                    </p>

                    <p>
                        Academic Registrar<br/>
                        Saurabh Kumar
                    </p>
                </div>
            </div>
        <?php } ?>

        <?php if ($_GET['type'] == 2){ ?>
            <div class="row">
                <div class="col l12 right-align"><h6>Date: <?php echo date("Y-m-d"); ?></h6></div>
            </div>
            <br/>
            <div class="row">
                <div class="col l12">
                    <h5><u>RE: FINAL ADMISSION LETTER</u></h5>
                    <h5><?php if ($s->sex == "Male") echo "Mr"; else echo "Mrs"; ?>. <?php echo $s->s_name; ?></h5>
                    <h5>Dear, <?php echo $s->s_name; ?></h5>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col l12">
                    <p>
                        Congratulations! You have been selected for a course at Sai Pali Institute of Technology & Management. The Admissions Committee has been given careful consideration to your application for admission in certificate in
                        <b>
                            <?php
                            $query = $this->db->query("SELECT name FROM courses WHERE id = $s->course");
                            $result = $query->result();
                            foreach ($result as $r)
                                echo $r->name;
                            ?>
                        </b>
                        and we are able to take favorable action at this time. We welcome you to the innovative heritage of a fine education to the varied resources of the faculty and to the dynamic student body that makes Sai Pali a special Institute. We are confident you will make a valuable contribution to the Institute’s tradition of scholarship and service.                    </p>
                    <p>
                        On behalf of the entire Sai Pali Institute community, I extend a warm welcome and best wishes for your success.
                    </p>
                    <br/><br/>
                    <p>
                        Yours truly,
                    </p>

                    <p>
                        Academic Registrar<br/>
                        Saurabh Kumar
                    </p>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="center-align">
    <button class="btn blue white-text" type="button" onclick="printLetter()">PRINT</button>
    </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>
<script type="application/javascript">

    function printLetter() {
        var prtContent = document.getElementById("printLetter");
        var prtCss = new String('<link href="<?php echo base_url();?>plugins/css/materialize.min.css" rel="stylesheet">');
        window.document.body.innerHTML=prtCss + prtContent.innerHTML;
        window.focus();
        window.print();
        window.close();
    }
</script>
</body>
</html>