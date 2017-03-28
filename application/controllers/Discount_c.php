<?php

/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 12/5/16
 * Time: 11:17 AM
 */
class Discount_c extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        if (empty($_SESSION['id'])){
            redirect("login/user");
        }

        $this->load->model("Discount_m");
        $this->load->helper(array('form', 'url'));
    }

    function update(){
        $id = $this->input->post('id');
        $default = $this->input->post('actual_amount');
        $percentage = $this->input->post('percentage');
        $final = ($percentage/100)*$default;
        $amount = array('total_discount' => $final);
        $this->Discount_m->updateAmount($amount, $id);

        redirect('diploma_c/editForm?id='.$id);
    }

}