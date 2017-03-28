<?php

class Accounts_reg extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("Dashboard_m");
        $this->load->model('Model_acc_reg');
        $this->load->helper(array('form', 'url'));
    }

    function index()
    {
        // a query of retrieving data from the database in a table enquiry
        $this->db->where('status', '0');
        $query = $this->db->get("enquiry");
        $data['records'] = $query->result();
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);

        $this->load->helper('url');
        //loading a view to show data in a table
        $this->load->view('accounts/accounts_view', $data);
    }

    function registered_students()
    {
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('accounts/registered', $data);
    }

    //this function is used to retieve records from the database table, to get ready for being updated.

    public function update_detail()
    {
        if (isset($_REQUEST['editid']) && $_REQUEST['editid'] != '' && $_REQUEST['editid'] != 0) {
            $data['records'] = $this->Model_acc_reg->update_detail();
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);

            $this->load->view('accounts/accounts_reg_update', $data);
        }
    }

    //this function updates the status to '1' in enquiry table of sms1 database, and inserts data to accounts_registration table.
    function status_update()
    {

        if (isset($_POST['update']) && $_POST['update'] == 'pay') {
            $this->Model_acc_reg->status_update();
            $this->session->set_tempdata('pay', 'student has paid for registration', '5');

            redirect(base_url() . 'accounts_reg');
        }

    }

    //this function is used for the printing of receipt.
    function print_receipt()
    {
        if (isset($_REQUEST['receiptid']) && $_REQUEST['receiptid'] != '' && $_REQUEST['receiptid'] != 0) {
            $data['records'] = $this->Model_acc_reg->print_receipt();
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('accounts/accounts_receipt', $data);
        }
    }


    //inserting payment method to the method table
    function add_payment_method()
    {

        $this->load->helper('form');
        //including validation library
        $this->load->library('form_validation');

        $this->form_validation->set_rules('method', 'payment method', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('accounts/add_method_view');
        } else {

            $data = array('name' => $this->input->post('method'));
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->db->insert('method', $data);
            $this->load->view('accounts/add_method_view', $data);
        }
    }

    //inserting currency type to the currency table

    function add_currency_type()
    {

        $this->load->helper('form');

        //including validation library
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'currency type', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('accounts/add_currency_type');
        } else {

            $data = array('name' => $this->input->post('name'));
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);

            $this->db->insert('currency', $data);
            $this->load->view('accounts/add_currency_type', $data);
        }
    }

    //this functionis for converting numbers to words.
    function convert_number_to_words($number)
    {

        $hyphen = '-';
        $conjunction = ' and ';
        $separator = ', ';
        $negative = 'negative ';
        $decimal = ' point ';
        $dictionary = array(
            0 => 'zero',
            1 => 'one',
            2 => 'two',
            3 => 'three',
            4 => 'four',
            5 => 'five',
            6 => 'six',
            7 => 'seven',
            8 => 'eight',
            9 => 'nine',
            10 => 'ten',
            11 => 'eleven',
            12 => 'twelve',
            13 => 'thirteen',
            14 => 'fourteen',
            15 => 'fifteen',
            16 => 'sixteen',
            17 => 'seventeen',
            18 => 'eighteen',
            19 => 'nineteen',
            20 => 'twenty',
            30 => 'thirty',
            40 => 'fourty',
            50 => 'fifty',
            60 => 'sixty',
            70 => 'seventy',
            80 => 'eighty',
            90 => 'ninety',
            100 => 'hundred',
            1000 => 'thousand',
            1000000 => 'million',
            1000000000 => 'billion',
            1000000000000 => 'trillion',
            1000000000000000 => 'quadrillion',
            1000000000000000000 => 'quintillion'
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int)$number < 0) || (int)$number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . convert_number_to_words(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens = ((int)($number / 10)) * 10;
                $units = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int)($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= convert_number_to_words($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string)$fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }

        return $string;
    }
}