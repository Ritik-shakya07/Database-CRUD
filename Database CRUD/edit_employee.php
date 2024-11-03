<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employe_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM employees WHERE id = $id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_name = $_POST['employee_name'];
    $employee_salary = $_POST['employee_salary'];
    $employee_email = $_POST['employee_email'];

    $sql = "UPDATE employees SET employee_name='$employee_name', employee_salary='$employee_salary', employee_email='$employee_email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: view_table.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
</head>
<body>

<h2>Edit Employee</h2>

<form method="post">
    <label for="employee_name">Name:</label>
    <input type="text" id="employee_name" name="employee_name" value="<?php echo $row['employee_name']; ?>" required>

    <label for="employee_salary">Salary:</label>
    <input type="number" id="employee_salary" name="employee_salary" value="<?php echo $row['employee_salary']; ?>" required>

    <label for="employee_email">Email:</label>
    <input type="email" id="employee_email" name="employee_email" value="<?php echo $row['employee_email']; ?>" required>

    <button type="submit">Update</button>
</form>

<a href="view_table.php">Back to Table</a>

</body>
</html>
