<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Account Demo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Bank Account Demo</h1>
    <form action="process.php" method="post">
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" required><br><br>

        <label for="operation">Operation:</label>
        <select id="operation" name="operation" required>
            <option value="deposit">Deposit</option>
            <option value="withdraw">Withdraw</option>
            <option value="transfer">Transfer</option>
            <option value="inquire">Inquire Balance</option> <!-- Corrected option value -->
        </select><br><br>

        <label for="account">Account:</label>
        <select id="account" name="account" required>
            <option value="account1">Account 1</option>
            <option value="account2">Account 2</option>
        </select><br><br>

        <?php
        // CSRF protection
        session_start();
        $token = bin2hex(random_bytes(32));
        $_SESSION['token'] = $token;
        ?>
        <input type="hidden" name="token" value="<?php echo $token; ?>">

        <input type="submit" value="Submit">
    </form>
</body>
</html>
