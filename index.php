<?php
   
   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "tourism"; // Define the database name
    

    // Establish connection
    $con = new mysqli($server, $username, $password, $database);

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Retrieve form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $other = $_POST['other'];

    // SQL query to insert data
    $query = "INSERT INTO `user` (`name`, `age`, `city`, `mobile`, `email`, `other`) 
              VALUES ('$name', '$age', '$city', '$mobile', '$email', '$other')";

    if ($con->query($query) === TRUE) {
        $insert = true;
        //echo "Successfully inserted";
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }

    // Close connection
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tourist Registration</title>
</head>

<body>
    <div class="container">
        <h3>Welcome To Tourimist </h3>
        <p>Enter your details to confirm your trip</p>

        <?php
        if($insert == true) {
            echo "<p class= 'submit_msg'>Thanks for subbmitting your form. </p>";
        }
            ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your full name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="city" id="city" placeholder="Enter the city you are in">
            <input type="text" name="mobile" id="mobile" placeholder="Mobile no.">
            <input type="email" name="email" id="email" placeholder="Email">
            <textarea name="other" id="other" placeholder="Enter any other information here"></textarea>

            <button class="btn">Submit</button>

        </form>

    </div>
    
</body>

</html>