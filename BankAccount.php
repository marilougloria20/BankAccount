<?php

class BankAccount {
    private $balance;

    public function __construct($initial_balance) {
        $this->balance = $initial_balance;
    }

    public function get_balance() {
        return $this->balance;
    }

    public function deposit($amount) {
        $this->balance += $amount;
    }

    public function withdraw($amount) {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            return true;
        } else {
            return false;
        }
    }

    public function send_money($recipient, $amount) {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            $recipient->deposit($amount);
            echo "Transfer successful: $amount transferred from this account to recipient's account.\n";
        } else {
            echo "Transfer failed: Insufficient funds.\n";
        }
    }
}

// Example usage:
$account1 = new BankAccount(15000);
$account2 = new BankAccount(20000);

echo "Account 1 balance: " . $account1->get_balance() . "\n";
echo "Account 2 balance: " . $account2->get_balance() . "\n";

$account1->send_money($account2, 10000);

echo "Account 1 balance after transfer: " . $account1->get_balance() . "\n";
echo "Account 2 balance after transfer: " . $account2->get_balance() . "\n";

