<?php
session_start();

// Verify CSRF token
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['token']) && isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {
    // Include the BankAccount class definition
    require_once 'BankAccount.php';

    // Instantiate BankAccount objects
    $account1 = new BankAccount(15000);
    $account2 = new BankAccount(20000);

    // Get form data
    $amount = isset($_POST['amount']) ? (float)$_POST['amount'] : 0;
    $operation = isset($_POST['operation']) ? $_POST['operation'] : '';
    $selected_account = isset($_POST['account']) ? $_POST['account'] : '';

    // Perform operation based on user input
    switch ($operation) {
        case 'deposit':
            if ($selected_account === 'account1') {
                $account1->deposit($amount);
            } else {
                $account2->deposit($amount);
            }
            break;
        case 'withdraw':
            if ($selected_account === 'account1') {
                $account1->withdraw($amount);
            } else {
                $account2->withdraw($amount);
            }
            break;
        case 'transfer':
            if ($selected_account === 'account1') {
                $account1->send_money($account2, $amount);
            } else {
                $account2->send_money($account1, $amount);
            }
            break;
        case 'inquire':
            if ($selected_account === 'account1') {
                echo "Account 1 balance: $" . $account1->get_balance();
            } else {
                echo "Account 2 balance: $" . $account2->get_balance();
            }
            exit(); // Exit after balance inquiry
            break;
        default:
            echo "Invalid operation.";
    }
} else {
    // Invalid token, redirect to error page or handle accordingly
    echo "Invalid request.";
}
?>
