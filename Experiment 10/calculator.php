<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$display = "";
$firstNumber = "";
$secondNumber = "";
$operator = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = isset($_POST['num1']) ? (float)$_POST['num1'] : 0;
    $num2 = isset($_POST['num2']) ? (float)$_POST['num2'] : 0;
    $op = isset($_POST['op']) ? $_POST['op'] : '';

    $result = "";
    if ($op === '+') $result = $num1 + $num2;
    elseif ($op === '-') $result = $num1 - $num2;
    elseif ($op === '*') $result = $num1 * $num2;
    elseif ($op === '/') {
        if ($num2 != 0) {
            $result = $num1 / $num2;
        } else {
            $result = "Error";
        }
    }

    $display = $result;
    if ($result !== "Error") {
        $firstNumber = (string)$result;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Grid Calculator</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f6f8;
      text-align: center;
      margin-top: 50px;
    }
    h2 {
      color: #333;
    }
    #calculator {
      display: inline-block;
      padding: 20px;
      border-radius: 10px;
      background-color: #ffffff;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    #display {
      width: 220px;
      height: 40px;
      font-size: 18px;
      text-align: right;
      margin-bottom: 15px;
      padding: 5px 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .buttons {
      display: grid;
      grid-template-columns: repeat(4, 55px);
      gap: 10px;
      justify-content: center;
    }
    button {
      height: 45px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      background-color: #e0e7ff;
      transition: background 0.2s;
    }
    button:hover {
      background-color: #c7d2fe;
    }
    .operator {
      background-color: #fcd34d;
    }
    .operator:hover {
      background-color: #fbbf24;
    }
    .equal {
      background-color: #34d399;
    }
    .equal:hover {
      background-color: #10b981;
    }
    .clear {
      background-color: #f87171;
    }
    .clear:hover {
      background-color: #ef4444;
    }
  </style>
</head>
<body>

  <h2>Calculator</h2>

  <div id="calculator">
    <input type="text" id="display" readonly value="<?php echo htmlspecialchars((string)$display); ?>">

    <!-- ✅ FIXED ACTION -->
    <form id="calc_form" method="post" action="calculator.php">
      <input type="hidden" name="num1" id="hidden_num1">
      <input type="hidden" name="op" id="hidden_op">
      <input type="hidden" name="num2" id="hidden_num2">
    </form>

    <div class="buttons">
      <button type="button" onclick="appendNumber('7')">7</button>
      <button type="button" onclick="appendNumber('8')">8</button>
      <button type="button" onclick="appendNumber('9')">9</button>
      <button type="button" class="operator" onclick="setOperator('/')">/</button>

      <button type="button" onclick="appendNumber('4')">4</button>
      <button type="button" onclick="appendNumber('5')">5</button>
      <button type="button" onclick="appendNumber('6')">6</button>
      <button type="button" class="operator" onclick="setOperator('*')">*</button>

      <button type="button" onclick="appendNumber('1')">1</button>
      <button type="button" onclick="appendNumber('2')">2</button>
      <button type="button" onclick="appendNumber('3')">3</button>
      <button type="button" class="operator" onclick="setOperator('-')">-</button>

      <button type="button" class="clear" onclick="clearDisplay()">C</button>
      <button type="button" onclick="appendNumber('0')">0</button>
      <button type="button" class="equal" onclick="submitCalculation()">=</button>
      <button type="button" class="operator" onclick="setOperator('+')">+</button>
    </div>
  </div>

  <script>
    let firstNumber = "<?php echo addslashes($firstNumber); ?>";
    let secondNumber = "";
    let operator = "";

    function appendNumber(num){
      if(operator === ""){
        if (firstNumber === "Error") firstNumber = "";
        firstNumber += num;
      } else {
        secondNumber += num;
      }
      document.getElementById("display").value = firstNumber + operator + secondNumber;
    }

    function setOperator(op){
      if(firstNumber !== "" && firstNumber !== "Error" && operator === ""){
        operator = op;
        document.getElementById("display").value = firstNumber + operator;
      } else if (firstNumber !== "" && firstNumber !== "Error" && operator !== "" && secondNumber === "") {
        operator = op;
        document.getElementById("display").value = firstNumber + operator;
      }
    }

    function submitCalculation() {
      if (firstNumber !== "" && operator !== "" && secondNumber !== "") {
        document.getElementById("hidden_num1").value = firstNumber;
        document.getElementById("hidden_op").value = operator;
        document.getElementById("hidden_num2").value = secondNumber;
        document.getElementById("calc_form").submit();
      }
    }

    function clearDisplay(){
      firstNumber = "";
      secondNumber = "";
      operator = "";
      document.getElementById("display").value = "";
    }
  </script>

</body>
</html>