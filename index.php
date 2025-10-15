<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP Exercises with User Input</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
// 1. Introduce Yourself
echo "<h2>1. Introduce Yourself</h2>";
?>
<form method="post">
  Name: <input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>"><br>
  Age: <input type="number" name="age" value="<?php if(isset($_POST['age'])) echo $_POST['age']; ?>"><br>
  Favorite Color: <input type="text" name="fav_color" value="<?php if(isset($_POST['fav_color'])) echo $_POST['fav_color']; ?>"><br>
  <input type="submit" name="intro_submit" value="Submit">
</form>
<?php
if (isset($_POST['intro_submit'])) {
  $name = $_POST['name'];
  $age = $_POST['age'];
  $fav_color = $_POST['fav_color'];
  echo "<p>Hi, I'm $name, I am $age years old, and my favorite color is $fav_color.</p>";
}

// 2. Simple Math
echo "<h2>2. Simple Math</h2>";
?>
<form method="post">
  A: <input type="number" name="a" value="<?php if(isset($_POST['a'])) echo $_POST['a']; ?>">
  B: <input type="number" name="b" value="<?php if(isset($_POST['b'])) echo $_POST['b']; ?>">
  <input type="submit" name="math_submit" value="Calculate">
</form>
<?php
if (isset($_POST['math_submit'])) {
  $a = $_POST['a'];
  $b = $_POST['b'];
  echo "<p>Sum: " . ($a + $b) . "<br>";
  echo "Difference: " . ($a - $b) . "<br>";
  echo "Product: " . ($a * $b) . "<br>";
  echo "Quotient: " . ($a / $b) . "</p>";
}

// 3. Area and Perimeter of a Rectangle
echo "<h2>3. Area and Perimeter of a Rectangle</h2>";
?>
<form method="post">
  Length: <input type="number" name="length" value="<?php if(isset($_POST['length'])) echo $_POST['length']; ?>">
  Width: <input type="number" name="width" value="<?php if(isset($_POST['width'])) echo $_POST['width']; ?>">
  <input type="submit" name="rect_submit" value="Calculate">
</form>
<?php
if (isset($_POST['rect_submit'])) {
  $length = $_POST['length'];
  $width = $_POST['width'];
  $area = $length * $width;
  $perimeter = 2 * ($length + $width);
  echo "<p>Area: $area<br>Perimeter: $perimeter</p>";
}

// 4. Temperature Converter
echo "<h2>4. Temperature Converter</h2>";
?>
<form method="post">
  Celsius: <input type="number" name="celsius" step="any" value="<?php if(isset($_POST['celsius'])) echo $_POST['celsius']; ?>">
  <input type="submit" name="temp_submit" value="Convert">
</form>
<?php
if (isset($_POST['temp_submit'])) {
  $c = $_POST['celsius'];
  $f = ($c * 9/5) + 32;
  echo "<p>$c °C = $f °F</p>";
}

// 5. Swapping Variables
echo "<h2>5. Swapping Variables</h2>";
?>
<form method="post">
  X: <input type="number" name="x" value="<?php if(isset($_POST['x'])) echo $_POST['x']; ?>">
  Y: <input type="number" name="y" value="<?php if(isset($_POST['y'])) echo $_POST['y']; ?>">
  <input type="submit" name="swap_submit" value="Swap">
</form>
<?php
if (isset($_POST['swap_submit'])) {
  $x = $_POST['x'];
  $y = $_POST['y'];
  $temp = $x;
  $x = $y;
  $y = $temp;
  echo "<p>After swapping: x = $x, y = $y</p>";
}

// 6. Salary Calculator
echo "<h2>6. Salary Calculator</h2>";
?>
<form method="post">
  Basic Salary: <input type="number" name="basic" value="<?php if(isset($_POST['basic'])) echo $_POST['basic']; ?>">
  Allowance: <input type="number" name="allowance" value="<?php if(isset($_POST['allowance'])) echo $_POST['allowance']; ?>">
  Deduction: <input type="number" name="deduction" value="<?php if(isset($_POST['deduction'])) echo $_POST['deduction']; ?>">
  <input type="submit" name="salary_submit" value="Compute">
</form>
<?php
if (isset($_POST['salary_submit'])) {
  $basic = $_POST['basic'];
  $allow = $_POST['allowance'];
  $deduct = $_POST['deduction'];
  $net = $basic + $allow - $deduct;
  echo "<p>Net Salary: ₱$net</p>";
}

// 7. BMI Calculator
echo "<h2>7. BMI Calculator</h2>";
?>
<form method="post">
  Weight (kg): <input type="number" step="any" name="weight" value="<?php if(isset($_POST['weight'])) echo $_POST['weight']; ?>">
  Height (m): <input type="number" step="any" name="height" value="<?php if(isset($_POST['height'])) echo $_POST['height']; ?>">
  <input type="submit" name="bmi_submit" value="Calculate">
</form>
<?php
if (isset($_POST['bmi_submit'])) {
  $w = $_POST['weight'];
  $h = $_POST['height'];
  $bmi = $w / ($h * $h);
  echo "<p>BMI: " . round($bmi, 2) . "</p>";
}

// 8. String Manipulation
echo "<h2>8. String Manipulation</h2>";
?>
<form method="post">
  Enter Sentence: <input type="text" name="sentence" value="<?php if(isset($_POST['sentence'])) echo $_POST['sentence']; ?>">
  <input type="submit" name="string_submit" value="Analyze">
</form>
<?php
if (isset($_POST['string_submit'])) {
  $s = $_POST['sentence'];
  echo "<p>Sentence: $s<br>";
  echo "Characters: " . strlen($s) . "<br>";
  echo "Words: " . str_word_count($s) . "<br>";
  echo "Uppercase: " . strtoupper($s) . "<br>";
  echo "Lowercase: " . strtolower($s) . "</p>";
}

// 9. Bank Account Simulation
echo "<h2>9. Bank Account Simulation</h2>";
?>
<form method="post">
  Balance: <input type="number" name="balance" value="<?php if(isset($_POST['balance'])) echo $_POST['balance']; ?>">
  Deposit: <input type="number" name="deposit" value="<?php if(isset($_POST['deposit'])) echo $_POST['deposit']; ?>">
  Withdraw: <input type="number" name="withdraw" value="<?php if(isset($_POST['withdraw'])) echo $_POST['withdraw']; ?>">
  <input type="submit" name="bank_submit" value="Update Balance">
</form>
<?php
if (isset($_POST['bank_submit'])) {
  $bal = $_POST['balance'];
  $dep = $_POST['deposit'];
  $wd = $_POST['withdraw'];
  $final = $bal + $dep - $wd;
  echo "<p>Final Balance: ₱$final</p>";
}

// 10. Simple Grading System
echo "<h2>10. Simple Grading System</h2>";
?>
<form method="post">
  Math: <input type="number" name="math" value="<?php if(isset($_POST['math'])) echo $_POST['math']; ?>">
  English: <input type="number" name="english" value="<?php if(isset($_POST['english'])) echo $_POST['english']; ?>">
  Science: <input type="number" name="science" value="<?php if(isset($_POST['science'])) echo $_POST['science']; ?>">
  <input type="submit" name="grade_submit" value="Compute">
</form>
<?php
if (isset($_POST['grade_submit'])) {
  $math = $_POST['math'];
  $eng = $_POST['english'];
  $sci = $_POST['science'];
  $avg = ($math + $eng + $sci) / 3;

  if ($avg >= 90) $grade = "A";
  elseif ($avg >= 80) $grade = "B";
  elseif ($avg >= 70) $grade = "C";
  elseif ($avg >= 60) $grade = "D";
  else $grade = "F";

  echo "<p>Average: " . round($avg, 2) . "<br>Grade: $grade</p>";
}

// 11. Currency Converter
echo "<h2>11. Currency Converter</h2>";
?>
<form method="post">
  PHP Amount: <input type="number" name="php_amount" value="<?php if(isset($_POST['php_amount'])) echo $_POST['php_amount']; ?>">
  <input type="submit" name="currency_submit" value="Convert">
</form>
<?php
if (isset($_POST['currency_submit'])) {
  $php = $_POST['php_amount'];
  $usd = 0.017;
  $eur = 0.016;
  $jpy = 2.68;
  echo "<p>₱$php = $" . round($php * $usd, 2) . " USD<br>";
  echo "₱$php = €" . round($php * $eur, 2) . " EUR<br>";
  echo "₱$php = ¥" . round($php * $jpy, 2) . " JPY</p>";
}

// 12. Travel Cost Estimator
echo "<h2>12. Travel Cost Estimator</h2>";
?>
<form method="post">
  Distance (km): <input type="number" name="distance" value="<?php if(isset($_POST['distance'])) echo $_POST['distance']; ?>">
  Fuel Consumption (km/L): <input type="number" step="any" name="fuel_con" value="<?php if(isset($_POST['fuel_con'])) echo $_POST['fuel_con']; ?>">
  Fuel Price (₱/L): <input type="number" step="any" name="fuel_price" value="<?php if(isset($_POST['fuel_price'])) echo $_POST['fuel_price']; ?>">
  <input type="submit" name="travel_submit" value="Estimate">
</form>
<?php
if (isset($_POST['travel_submit'])) {
  $d = $_POST['distance'];
  $f = $_POST['fuel_con'];
  $p = $_POST['fuel_price'];
  $cost = ($d / $f) * $p;
  echo "<p>Estimated Travel Cost: ₱" . round($cost, 2) . "</p>";
}
?>

</body>
</html>
