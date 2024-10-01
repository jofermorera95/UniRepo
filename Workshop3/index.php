<?php
// Database connection
include 'db_connection.php';
//#

// Initialize variables
$name = '';
$lastName = '';
$phone = '';
$mail = '';
$province_id = '';
//#

if (isset($_GET['name']) && isset($_GET['lastname']) && isset($_GET['phone']) && isset($_GET['mail']) && isset($_GET['province'])) {
    // Retrieve the values from the form
    $name = $_GET['name'];
    $lastName = $_GET['lastname'];
    $phone = $_GET['phone'];
    $mail = $_GET['mail'];
    $province_id = $_GET['province'];
    //#

    // Prepare the SQL to insert the data into the users table
    $sql = "INSERT INTO users (name, lastname, phone, email, province_id) VALUES ('$name', '$lastName', '$phone', '$mail', '$province_id')";
    //#

    // Execute the query and check if the insertion was successful
    if ($conn->query($sql) === TRUE) {
        echo "Info was added into the DB";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //#
}

// Select * provinces from the database
$provinceQuery = "SELECT id, province_name FROM provinces";
$provinceResult = $conn->query($provinceQuery);
//#

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register User</title>
</head>
<body>
  <h1>User Registration</h1>
  
  <!-- Form to collect user data -->
  <form action="" method="GET">
    <div class="form-group">

      <!--#Fill and add default values -->
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name); ?>" placeholder="Your name">
      <label for="lastname">Last Name</label>
      <input type="text" class="form-control" name="lastname" value="<?php echo htmlspecialchars($lastName); ?>" placeholder="Your last name">
      <label for="phone">Phone Number</label>
      <input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($phone); ?>" placeholder="Your phone number">
      <label for="mail">Email Address</label>
      <input type="email" class="form-control" name="mail" value="<?php echo htmlspecialchars($mail); ?>" placeholder="Your email address">
      <!-- # -->
       
      <!-- Province Dropdown -->
      <label for="province">Province:</label>
      <select name="province" required>
        <option value="">Select a province</option>
        <?php
        if ($provinceResult->num_rows > 0) {
            while ($row = $provinceResult->fetch_assoc()) {
                echo '<option value="' . $row['id'] . '">' . $row['province_name'] . '</option>';
            }
        } else {
            echo '<option value="">No provinces available</option>';
        }
        ?>
      </select><br><br>

      <!-- Submit and Print Buttons -->
      <button type="submit">Submit</button>
      <button type="button" onclick="printInfo()">Print</button>
    </div>
  </form>

  <script>
    function printInfo() {
    // Redirect to the print.php file
    window.location.href = 'utils/print.php';  // Adjust path if needed
    }
  </script>
</body>
</html>