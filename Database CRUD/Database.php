<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Form</title>
    <style>
        /* Your existing styles */
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        .form-container {
            width: 300px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
        .view-table-btn {
  background: linear-gradient(to bottom right, #EF4765, #FF9A5A);
  border: 0;
  border-radius: 12px;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system,system-ui,"Segoe UI",Roboto,Helvetica,Arial,sans-serif;
  font-size: 16px;
  font-weight: 500;
  line-height: 2.5;
  outline: transparent;
  padding: 0 1rem;
  text-align: center;
  text-decoration: none;
  transition: box-shadow .2s ease-in-out;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
}

.button-62:not([disabled]):focus {
  box-shadow: 0 0 .25rem rgba(0, 0, 0, 0.5), -.125rem -.125rem 1rem rgba(239, 71, 101, 0.5), .125rem .125rem 1rem rgba(255, 154, 90, 0.5);
}

.button-62:not([disabled]):hover {
  box-shadow: 0 0 .25rem rgba(0, 0, 0, 0.5), -.125rem -.125rem 1rem rgba(239, 71, 101, 0.5), .125rem .125rem 1rem rgba(255, 154, 90, 0.5);
}
        }
        .view-table-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Employee Form</h2>
        <form method="post">
            <!-- Your form groups go here -->
            <div class="form-group">
                <label for="emp-name">Employee Name:</label>
                <input type="text" id="emp-name" name="employee_name" required>
            </div>
            <div class="form-group">
                <label for="emp-id">Employee ID:</label>
                <input type="text" id="emp-id" name="employee_id" required>
            </div>
            <div class="form-group">
                <label for="emp-salary">Employee Salary:</label>
                <input type="number" id="emp-salary" name="employee_salary" required>
            </div>
            <div class="form-group">
                <label for="emp-email">Email:</label>
                <input type="email" id="emp-email" name="employee_email" required>
            </div>
            <div class="form-group">
                <label for="emp-password">Password:</label>
                <input type="password" id="emp-password" name="employee_password" required>
            </div>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
        <!-- Link to the new page with the employee table -->
        <a href="view_table.php" class="view-table-btn">View Table</a>
    </div>

    <?php
    // Your existing PHP code for inserting data
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "employe_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $employee_name = $_POST['employee_name'];
        $employee_id = $_POST['employee_id'];
        $employee_salary = $_POST['employee_salary'];
        $employee_email = $_POST['employee_email'];
        $employee_password = password_hash($_POST['employee_password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO employees (employee_name, employee_id, employee_salary, employee_email, employee_password)
                VALUES ('$employee_name', '$employee_id', '$employee_salary', '$employee_email', '$employee_password')";

        if ($conn->query($sql) === TRUE) {
            echo "New employee record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</body>
</html>
