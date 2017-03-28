<?php
/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 10/28/16
 * Time: 12:47 PM
 */
?>
</div>
<!-- END WRAPPER -->

</div>
<!-- END MAIN -->

<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START FOOTER -->
<footer class="page-footer">
    <div class="footer-copyright">
        <div class="container">
            Copyright © 2017 <a class="grey-text text-lighten-4" href="http://www.saipali.com" target="_blank">Saipali Infotech</a> All rights reserved.
            <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://geekslabs.com/">Saipai Infotech</a></span>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<!-- ================================================
Scripts
================================================ -->

<script type="text/javascript" src="<?php echo base_url(); ?>plugins/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/js/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/js/materialize.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/js/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/js/plugins.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/js/custom-script.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select').material_select();
    });

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 60 // Creates a dropdown of 15 years to control year
    });
</script>