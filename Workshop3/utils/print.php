<?php
// Include your database connection
include '../db_connection.php';  // Make sure this path is correct based on your file structure

// Select * users from the database
$sql = "SELECT users.name, users.lastname, users.phone, users.email, provinces.province_name 
        FROM users 
        JOIN provinces ON users.province_id = provinces.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>User Information</h1>";
    echo "<table border='1'>
            <tr>
                <th>Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Province</th>
            </tr>";
    
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['name']) . "</td>
                <td>" . htmlspecialchars($row['lastname']) . "</td>
                <td>" . htmlspecialchars($row['phone']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
                <td>" . htmlspecialchars($row['province_name']) . "</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No users found in the database.";
}

// Close the database connection
$conn->close();
?>