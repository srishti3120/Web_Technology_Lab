<?php
$string = "Hello";
$integer = 10;
$float = 3.14;
$boolean = true;
$nullVar = null;
$array = array("Apple", "Banana", "Cherry");

echo "<h1>Data Types</h1>";

echo "<p>Type of string: " . gettype($string) . "</p>";
echo "<p>Type of integer: " . gettype($integer) . "</p>";
echo "<p>Type of float: " . gettype($float) . "</p>";
echo "<p>Type of boolean: " . gettype($boolean) . "</p>";
echo "<p>Type of null: " . gettype($nullVar) . "</p>";
echo "<p>Type of array: " . gettype($array) . "</p>";

echo "<h2>Type Checking</h2>";

echo is_string($string) ? "String ✔<br>" : "";
echo is_int($integer) ? "Integer ✔<br>" : "";
echo is_float($float) ? "Float ✔<br>" : "";
echo is_bool($boolean) ? "Boolean ✔<br>" : "";
echo is_null($nullVar) ? "Null ✔<br>" : "";
echo is_array($array) ? "Array ✔<br>" : "";

$person = array(
    "name" => "Srishti",
    "age" => 18,
    "city" => "Bangalore",
    "language" => "PHP"
);

echo "<h2>Personal Details (print_r)</h2>";
echo "<pre>";
print_r($person);
echo "</pre>";
?>