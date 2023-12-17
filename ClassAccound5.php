<?php
require_once 'ClassAccound1.php';

class BankAccount extends Account {
    // Tambah data baru customer
    public $customer;

    function __construct($no, $saldo_awal, $cust) {
        // panggil constructor parent class
        parent::__construct($no, $saldo_awal);
        $this->customer = $cust;
    }

    // tulis ulang method cetak
    function cetak(){
        parent::cetak();
        echo ', Customer: ' . $this->customer;
    }

    function transfer($obj_account, $uang) {
        $obj_account->deposit($uang);
        $this->withdraw($uang);
    }
}
?>
