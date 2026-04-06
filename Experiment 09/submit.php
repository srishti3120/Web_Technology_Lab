<?php
// 🔧 SHOW ERRORS (remove later if needed)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 🌐 DATABASE CONFIG (InfinityFree)
$servername = "sql112.infinityfree.com";
$username = "if0_41593865";
$password = "Srishti3012";
$dbname = "if0_41593865_form";

// 🔌 CREATE CONNECTION (DIRECT DB CONNECTION)
$conn = new mysqli($servername, $username, $password, $dbname);

// ❌ CHECK CONNECTION
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 📥 PROCESS FORM DATA
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $dob = $conn->real_escape_string($_POST['dob']);

    // Handle gender
    $gender = isset($_POST['gender']) 
        ? $conn->real_escape_string($_POST['gender']) 
        : "Not specified";

    // Handle hobbies (array → string)
    $hobbies = isset($_POST['hobby']) 
        ? implode(", ", $_POST['hobby']) 
        : "None";

    $hobbies = $conn->real_escape_string($hobbies);

    // 📝 INSERT QUERY
    $sql = "INSERT INTO users (name, email, dob, gender, hobbies)
            VALUES ('$name', '$email', '$dob', '$gender', '$hobbies')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "New record created successfully!";
    } else {
        $error_message = "Error: " . $conn->error;
    }
}

// 🔚 CLOSE CONNECTION
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submission Result</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .result-box {
            border: 5px solid powderblue;
            padding: 20px;
            max-width: 500px;
            margin: auto;
        }
        .success { color: green; font-weight: bold; }
        .error { color: red; font-weight: bold; }
    </style>
</head>
<body>

<div class="result-box">
    <h3>Form Submission Status</h3>

    <?php if (isset($success_message)): ?>
        <p class="success"><?php echo $success_message; ?></p>

        <h4>Submitted Data:</h4>
        <ul>
            <li><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></li>
            <li><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></li>
            <li><strong>DOB:</strong> <?php echo htmlspecialchars($dob); ?></li>
            <li><strong>Gender:</strong> <?php echo htmlspecialchars($gender); ?></li>
            <li><strong>Hobbies:</strong> <?php echo htmlspecialchars($hobbies); ?></li>
        </ul>

    <?php elseif (isset($error_message)): ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php else: ?>
        <p>No data received.</p>
    <?php endif; ?>

    <br>
    <a href="index.html">Go Back to Form</a>
</div>

</body>
</html>