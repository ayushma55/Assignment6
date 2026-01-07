<?php
$conn = mysqli_connect("localhost", "root", "", "bank");

if (!$conn) {
    die("Connection failed");
}

mysqli_autocommit($conn, FALSE); // Disable auto commit

try {
    // Deduct amount from Account 101
    $sql1 = "UPDATE accounts SET balance = balance - 1000 WHERE acc_no = 101";
    if (!mysqli_query($conn, $sql1)) {
        throw new Exception("Error in debit");
    }

    // ERROR QUERY (wrong account number to force error)
    $sql2 = "UPDATE accounts SET balance = balance + 1000 WHERE acc_no = 999";
    if (mysqli_affected_rows($conn) == 0) {
        throw new Exception("Credit failed");
    }

    // Commit if both queries succeed
    mysqli_commit($conn);
    echo "Transaction Successful";

} catch (Exception $e) {

    // Rollback on error
    mysqli_rollback($conn);
    echo "Transaction Failed. Rollback Done!";
}

mysqli_close($conn);
?>
