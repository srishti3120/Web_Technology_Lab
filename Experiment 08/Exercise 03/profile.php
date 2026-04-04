<?php
$name = "Srishti";
$age = 18;
$city = "Bangalore";
$fav_language = "PHP";
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
</head>
<body>

<h1>My Profile</h1>

<?php
echo "<p><strong>Name:</strong> $name</p>";
echo "<p><strong>Age:</strong> $age</p>";
echo "<p><strong>City:</strong> $city</p>";
echo "<p><strong>Favourite Language:</strong> $fav_language</p>";
?>

<h2>Variable Details (var_dump)</h2>
<pre>
<?php
var_dump($name);
var_dump($age);
var_dump($city);
var_dump($fav_language);
?>
</pre>

</body>
</html>