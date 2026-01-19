<?php

class BankAccount {

    // Private properties (Encapsulation)
    private $accountNumber;
    private $accountHolder;
    private $balance;
    private $pin;
    private $transactionHistory = [];

    // Constructor
    public function __construct($accountNumber, $accountHolder, $balance, $pin) {
        $this->accountNumber = $accountNumber;
        $this->accountHolder = $accountHolder;
        $this->balance = $balance;
        $this->pin = $pin;

        $this->addTransaction("Account created with balance Rs. $balance");
    }

    // Deposit money
    public function deposit($amount) {
        if ($amount <= 0) {
            return "Invalid deposit amount.";
        }

        $this->balance += $amount;
        $this->addTransaction("Deposited Rs. $amount");

        return "Deposit successful.";
    }

    // Withdraw money (PIN required)
    public function withdraw($amount, $pin) {
        if ($pin !== $this->pin) {
            return "Incorrect PIN. Withdrawal denied.";
        }

        if ($amount <= 0) {
            return "Invalid withdrawal amount.";
        }

        if ($amount > $this->balance) {
            return "Insufficient balance.";
        }

        $this->balance -= $amount;
        $this->addTransaction("Withdrawn Rs. $amount");

        return "Withdrawal successful.";
    }

    // Get balance (PIN required)
    public function getBalance($pin) {
        if ($pin !== $this->pin) {
            return "Incorrect PIN. Access denied.";
        }

        return "Current balance: Rs. " . $this->balance;
    }

    // Change PIN
    public function changePin($oldPin, $newPin) {
        if ($oldPin !== $this->pin) {
            return "Old PIN does not match.";
        }

        $this->pin = $newPin;
        $this->addTransaction("PIN changed successfully");

        return "PIN updated successfully.";
    }

    // Add transaction to history
    private function addTransaction($message) {
        $this->transactionHistory[] = date("Y-m-d H:i:s") . " - " . $message;
    }

    // Display transaction history
    public function getTransactionHistory() {
        return $this->transactionHistory;
    }
}


// creating accounts and performing transactions

$account = new BankAccount("ACC101", "Ayushma Dhamala", 5000, 1234);

echo $account->deposit(2000) . "<br>";
echo $account->withdraw(1500, 1234) . "<br>";
echo $account->withdraw(500, 1111) . "<br>"; // Wrong PIN
echo $account->getBalance(1234) . "<br>";
echo $account->changePin(1234, 4321) . "<br>";
echo $account->getBalance(4321) . "<br>";

echo "<br><strong>Transaction History:</strong><br>";
foreach ($account->getTransactionHistory() as $transaction) {
    echo $transaction . "<br>";
}




?>
