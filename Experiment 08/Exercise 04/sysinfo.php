<?php
// Basic PHP variables
$phpVersion = PHP_VERSION;
$os = PHP_OS;
$maxInt = PHP_INT_MAX;
$eol = 'PHP_EOL'; // show literal text
$date = date('l, d F Y');
$time = date('H:i:s');

// Array of favourite technologies
$tech = ["PHP", "Java", "JavaScript"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>System Info</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 40px;
            color: #333;
        }
        h1 {
            color: #2c3e50;
        }
        .card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        ul {
            padding-left: 20px;
        }
        li {
            margin: 5px 0;
        }
        #clock {
            font-weight: bold;
            color: #e74c3c;
        }
        .note {
            margin-top: 20px;
            font-style: italic;
            color: #555;
        }
    </style>
</head>

<body>

<h1>System Information</h1>

<div class="card">
    <p><strong>PHP Version:</strong> <?php echo $phpVersion; ?></p>
    <p><strong>Operating System:</strong> <?php echo $os; ?></p>
    <p><strong>Maximum Integer:</strong> <?php echo $maxInt; ?></p>
    <p><strong>End-of-Line Character:</strong> <?php echo $eol; ?></p>
    <p><strong>Today's Date:</strong> <?php echo $date; ?></p>
    <p><strong>Current Time:</strong> <span id="clock"><?php echo $time; ?></span></p>
</div>

<div class="card">
    <h2>Server Info</h2>
    <p><strong>Document Root:</strong> <?php echo $_SERVER['DOCUMENT_ROOT']; ?></p>
    <p><strong>Script Path:</strong> <?php echo $_SERVER['SCRIPT_FILENAME']; ?></p>
</div>

<div class="card">
    <h2>Favourite Technologies</h2>
    <ul>
        <?php
        foreach ($tech as $item) {
            echo "<li>$item</li>";
        }
        ?>
    </ul>
</div>

<div class="note">
    This page refreshes each request — PHP re-runs every time.
</div>

</body>
</html>