<?php 
class M_currency extends CI_Model
{
    function __construct() {
parent::__construct();
}

function currency(){
    $this->CurrencyConverter = new CurrencyConverter();

}
}
?>