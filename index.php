<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iste_responses";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['message'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $message = $_POST['message'];

  $stmt = $conn->prepare("INSERT INTO responses(firstname, lastname, email, phone, address, message) VALUES (?, ?, ?, ?, ?, ?)");

  $stmt->bind_param("sssiss", $firstname, $lastname, $email, $phone, $address, $message);

  if ($stmt->execute()) {
    echo "Thanks for Submitting!";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
} else {
  echo "Please fill out all fields.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Get In Touch</h1>
        <p></p>
            
        <form action="#" method="post">
            <div class="row">
                <div class="column1">
                    <label for="firstname"></label>
                    <input type="text" id="firstname" name="firstname" placeholder="First Name" required>
                </div>
                <div class="column1">
                    <label for="lastname"></label>
                    <input type="text" id="lastname" name="lastname" placeholder="Last Name" required>
                </div>
            </div>
            <div class="row">
                <div class="column2">
                    <label for="email"></label>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="column2">
                    <label for="phone"></label>
                    <input type="tel" id="phone" name="phone" placeholder="Phone" required>
                </div>
            </div>
            <div class="row">
                <div class="column3">
                    <label for="address"></label>
                    <input type="text" id="address" name="address" placeholder="Address">
                </div>
            </div>
            <div class="row">
                <div class="column4">
                    <label for="message"></label>
                    <input type="text" id="message" name="message" placeholder="Type your message here " required>
                </div>
            </div>
            <button>Submit</button>
        </form>
    </div>

        

</body>
</html>
