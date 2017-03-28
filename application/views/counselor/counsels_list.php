<?php

?>
<html>
<head>
    <title>Diploma Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<section id="main-content">
    <div class="inner-content">
        <div class="container-fluid">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h4>Uncounseled Students</h4>
                </div>
            </div>
            <div class="table-responsive ">
                <table class="table table-striped table-hover dataTables-example">
                    <thead class="blue white-text">
                    <tr>
                        <td></td>
                        <td>Student Name</td>
                        <td>Contact</td>
                        <td>Email</td>
                        <td>Course</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;

                    $cond = 0;
                    $query1 = $this->db->query("SELECT ids FROM counselor");
                    $query2 = $this->db->query("SELECT * FROM students");
                    $result1 = $query1->result();
                    $result2 = $query2->result();

                    $test = $this->db->query("SELECT * FROM students AS s WHERE NOT EXISTS(SELECT * FROM counselor AS c WHERE s.id = c.ids) ");
                    $testresult = $test->result();

                    foreach ($testresult as $s){
                        ?>
                    <tr>
                        <td><img class="img-circle" width="50" height="50"
                                 src="<?php echo base_url(); ?>students/<?php echo $s->photo; ?>"></td>
                        <td><?php echo $s->s_name; ?></td>
                        <td><?php echo $s->phone; ?></td>
                        <td><?php echo $s->email; ?></td>
                        <td>
                            <?php
                            $r = $this->db->select('name')->from('courses')->where('id', $s->course)->get()->result();
                            foreach ($r as $c){
                                echo $c->name;
                            }
                            ?>
                        </td>
                        <td class="text-center">
                            <a href="<?php echo base_url(); ?>counselor/counselDetails?id=<?php echo $s->id; ?>">
                                <button title="click to view this record"
                                        class="btn-floating btn-small waves-effect waves-light blue"><i
                                        class="small material-icons">visibility</i></button>
                            </a>
                        </td>
            </div>
            </tr>
            <?php
            $i++;
            $cond = 0;
            } ?>
            </tbody>
            </table>
        </div>
    </div>
    </div>
</section>
<?php $this->load->view('dashboard/footer'); ?>
<script src="<?php echo base_url(); ?>plugins/js/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        $('.dataTables-example').DataTable({
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {
                    extend: 'print',
                    customize: function (win) {
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
    function deleteStudent(i) {
        $('#modal' + i).openModal();
    }
</script>
</body>
</html>