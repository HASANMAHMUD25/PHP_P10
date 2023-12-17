<?php
require_once 'ClassAccound5.php';

class AccountBank extends BankAccount {
    public static $biaya_admin = 5000;

    function __construct($no, $saldo_awal, $cust) {
        parent::__construct($no, $saldo_awal, $cust);
    }

    function transfer($obj_account, $uang) {
        $obj_account->deposit($uang);
        $this->withdraw($uang + self::$biaya_admin); // Tambah biaya admin ke penarikan
    }

    function withdraw($amount) {
        $this->saldo -= $amount;
    }
}

$ab1 = new AccountBank("010", 5000000, "Messi");
$ab2 = new AccountBank("070", 10000000, "Ronaldo");

$ab1->cetak();
echo '<hr/>';
$ab2->cetak();
echo '<br/>Ronaldo transfer uang ke Messi 1250000<br/>';
echo 'Biaya Admin : ' . AccountBank::$biaya_admin . '<br/>';
$ab2->transfer($ab1, 1250000);
$ab1->cetak();
echo '<hr/>';
$ab2->cetak();

$ab1_ab = [$ab1, $ab2];
?>
