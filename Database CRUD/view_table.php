<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .button-group form {
            display: inline;
        }
        .button-group button {
            padding: 5px 10px;
            cursor: pointer;
            border: none;
            color: white;
            border-radius: 5px;
        }
        .edit-btn {
            background-color: #4CAF50;
        }
        .delete-btn {
            background-color: #f44336;
        }
    </style>
</head>
<body>

    <h2>Employee Table</h2>
    <table>
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Salary</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "employe_db";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM employees";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["employee_id"] . "</td>";
                    echo "<td>" . $row["employee_name"] . "</td>";
                    echo "<td>" . $row["employee_salary"] . "</td>";
                    echo "<td>" . $row["employee_email"] . "</td>";
                    echo "<td class='button-group'>
                            <form action='edit_employee.php' method='GET' style='display:inline;'>
                                <input type='hidden' name='id' value='" . $row["id"] . "'>
                                <button type='submit' class='edit-btn'>Edit</button>
                            </form>
                            <form action='delete_employee.php' method='GET' style='display:inline;'>
                                <input type='hidden' name='id' value='" . $row["id"] . "'>
                                <button type='submit' class='delete-btn' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

</body>
</html>
