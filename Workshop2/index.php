<?php
 include 'db_connection.php';

$name = '';
$lastName = '';
$phone = '';
$mail = '';

if (isset($_GET['name']) && isset($_GET['lastname']) && isset($_GET['phone']) && isset($_GET['mail'])) {
    //# Retrieve the values from the form
    $name = $_GET['name'];
    $lastName = $_GET['lastname'];
    $phone = $_GET['phone'];
    $mail = $_GET['mail'];
    //#

    //# Prepare an SQL to insert the data into the database
    $sql = "INSERT INTO users (name, lastname, phone, email) VALUES ('$name', '$lastName', '$phone', '$mail')";
    //#

    // Execute the query and check if the insertion was successful
    if ($conn->query($sql) === TRUE) {
        echo "Info was added into the DB";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //#
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Print Name</title>
</head>
<body>
  <!--# Send info to URL using GET -->
  <form action="" method="GET">
    <div class="form-group">
      <label for="name">Name</label>

      <!--#Fill and add default values -->
      <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name); ?>" placeholder="Your name">
      <label for="lastname">Last Name</label>
      <input type="text" class="form-control" name="lastname" value="<?php echo htmlspecialchars($lastName); ?>" placeholder="Your last name">
      <label for="phone">Phone Number</label>
      <input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($phone); ?>" placeholder="Your phone number">
      <label for="mail">Email Address</label>
      <input type="email" class="form-control" name="mail" value="<?php echo htmlspecialchars($mail); ?>" placeholder="Your email address">
      <!-- # -->

    </div>
     <!-- # Buttons -->
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="button" class="btn btn-secondary" onclick="printInfo()">Print</button>
     <!-- # -->

  </form>
  <!--#-->
  
  <script>
    function printInfo() {
      //# Build the URL with current form values
      const name = encodeURIComponent(document.querySelector('input[name="name"]').value);
      const lastName = encodeURIComponent(document.querySelector('input[name="lastname"]').value);
      const phone = encodeURIComponent(document.querySelector('input[name="phone"]').value);
      const mail = encodeURIComponent(document.querySelector('input[name="mail"]').value);
      //#

      //# Redirect to print.php with the query string
      window.location.href = `utils/print.php?name=${name}&lastname=${lastName}&phone=${phone}&mail=${mail}`;
      //#
    }
  </script>

</body>
</html>