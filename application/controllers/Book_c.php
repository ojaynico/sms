<?php
/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 10/14/16
 * Time: 12:12 PM
 */
class Book_c extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($_SESSION['id'])) {
            redirect("login/user");
        }

        $this->load->model("Dashboard_m");
        $this->load->model('Books_m');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['books'] = $this->Books_m->getBookList();
        $this->load->view('library/books_list', $data);
    }

    public function bookForm(){
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('library/book_form', $data);
    }

    public function addBook()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('book_title', 'Book Name', 'required|max_length[128]');
        $this->form_validation->set_rules('author', 'Book author', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('library/book_form', $data);
        } else {
            $data = array(
                'book_title' => $this->input->post('book_title'),
                'author' => $this->input->post('author'),
                'description' => $this->input->post('description'),
                'course' => $this->input->post('course'),
            );

            $this->Books_m->form_insert($data);
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('library/book_form', $data);
        }
    }

    public function books()
    {
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['books'] = $this->Books_m->getBookList();
        $this->load->view('library/books_list', $data);
    }

    public function bookDetails()
    {
        $id = $this->input->get('id', TRUE);
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['book'] = $this->Books_m->getBookDetails($id);
        $this->load->view('library/book_details', $data);
    }

    public function deleteBook()
    {
        $id = $this->input->get('id');
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['msg'] = $this->Books_m->deleteBook($id);
        $this->books();
    }

    public function editForm()
    {
        $id = $this->input->get('id');
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['book'] = $this->Books_m->getBookDetails($id);
        $this->load->view('library/book_edit', $data);
    }

    public function editBook()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('book_title', 'Book Name', 'required|max_length[128]');
        $this->form_validation->set_rules('author', 'Book author', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('library/book_form', $data);
        } else {
            $data = array(

                'book_title' => $this->input->post('book_title'),
                'author' => $this->input->post('author'),
                'description' => $this->input->post('description'),
                'course' => $this->input->post('course'),
            );
             $id= $this->input->post('ID');
            $this->Books_m->editBook( $id,$data);

            $msg['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $msg['success'] = array('msg' => "Book Information Successfully Updated");
            $msg['book'] = $this->Books_m->getBookdetails($id);
            $this->load->view('library/book_edit', $msg);
        }

    }
}
  

    