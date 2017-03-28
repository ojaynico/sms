<?php
/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 11/21/16
 * Time: 11:30 AM
 */

class Login extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_m');
        $this->load->helper('form', 'url');
    }

    function index(){
        $this->load->view('home/header');
        $this->load->view('home/index');
        $this->load->view('home/footer');
    }

    function user(){
        $this->load->view('home/header');
        $this->load->view('home/login');
        $this->load->view('home/footer');
    }

    public function loginMe()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('home/header');
            $this->load->view('home/login');
            $this->load->view('home/footer');
        }
        else
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $result = $this->Login_m->loginUser($email, $password);

            if(count($result) > 0)
            {
                foreach ($result as $res)
                {

                    if ($res->status == "inactive")
                        break;

                    session_start();
                    $_SESSION['id'] = $res->id;
                    $_SESSION['user_id'] = $res->idno;
                    $_SESSION['role'] = $res->role;

                    redirect('dashboard');
                }

                $data['error'] = array('error'=>'You Are not Authorised');
                $this->load->view('home/header');
                $this->load->view('home/login', $data);
                $this->load->view('home/footer');

            }
            else
            {
                $data['error'] = array('error'=>'Wrong Email or password');
                $this->load->view('home/header');
                $this->load->view('home/login', $data);
                $this->load->view('home/footer');
            }
        }
    }
}