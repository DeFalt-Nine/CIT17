<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP Exercises</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
// 1. Introduce Yourself
$name = "Alforick";
$age = 22;
$fav_color = "Red";
echo "<h2>1. Introduce Yourself</h2>";
echo "<p>Hi, I'm $name, I am $age years old, and my favorite color is $fav_color.</p>";

// 2. Simple Math
$a = 10;
$b = 15;
echo "<h2>2. Simple Math</h2>";
echo "<p>Sum: " . ($a + $b) . "<br>";
echo "Difference: " . ($a - $b) . "<br>";
echo "Product: " . ($a * $b) . "<br>";
echo "Quotient: " . ($a / $b) . "</p>";

// 3. Area and Perimeter of a Rectangle
$length = 8;
$width = 7;
$area = $length * $width;
$perimeter = 2 * ($length + $width);
echo "<h2>3. Area and Perimeter of a Rectangle</h2>";
echo "<p>Area: $area<br>Perimeter: $perimeter</p>";

// 4. Temperature Converter
$celsius = 25;
$fahrenheit = ($celsius * 9/5) + 32;
echo "<h2>4. Temperature Converter</h2>";
echo "<p>$celsius °C = $fahrenheit °F</p>";

// 5. Swapping Variables
$x = 10;
$y = 20;
$temp = $x;
$x = $y;
$y = $temp;
echo "<h2>5. Swapping Variables</h2>";
echo "<p>After swapping: x = $x, y = $y</p>";

// 6. Salary Calculator
$basic_salary = 15000;
$allowance = 5000;
$deduction = 2000;
$net_salary = $basic_salary + $allowance - $deduction;
echo "<h2>6. Salary Calculator</h2>";
echo "<p>Net Salary: ₱$net_salary</p>";

// 7. BMI Calculator
$weight = 70; // kg
$height = 1.75; // m
$bmi = $weight / ($height * $height);
echo "<h2>7. BMI Calculator</h2>";
echo "<p>BMI: " . round($bmi, 2) . "</p>";

// 8. String Manipulation
$sentence = "Baguio City is a beautiful place.";
echo "<h2>8. String Manipulation</h2>";
echo "<p>Sentence: $sentence<br>";
echo "Number of characters: " . strlen($sentence) . "<br>";
echo "Number of words: " . str_word_count($sentence) . "<br>";
echo "Uppercase: " . strtoupper($sentence) . "<br>";
echo "Lowercase: " . strtolower($sentence) . "</p>";

// 9. Bank Account Simulation
$balance = 10000;
$deposit = 3000;
$withdraw = 1500;
$balance = $balance + $deposit - $withdraw;
echo "<h2>9. Bank Account Simulation</h2>";
echo "<p>Final Balance: ₱$balance</p>";

// 10. Simple Grading System
$math = 85;
$english = 90;
$science = 88;
$average = ($math + $english + $science) / 3;

if ($average >= 90) $grade = "A";
elseif ($average >= 80) $grade = "B";
elseif ($average >= 70) $grade = "C";
elseif ($average >= 60) $grade = "D";
else $grade = "F";

echo "<h2>10. Simple Grading System</h2>";
echo "<p>Average: " . round($average, 2) . "<br>Grade: $grade</p>";

// 11. Currency Converter
$php_amount = 1000;
$usd_rate = 0.017;
$eur_rate = 0.016;
$jpy_rate = 2.68;

echo "<h2>11. Currency Converter</h2>";
echo "<p>₱$php_amount in USD: $" . round($php_amount * $usd_rate, 2) . "<br>";
echo "₱$php_amount in EUR: €" . round($php_amount * $eur_rate, 2) . "<br>";
echo "₱$php_amount in JPY: ¥" . round($php_amount * $jpy_rate, 2) . "</p>";

// 12. Travel Cost Estimator
$distance = 300; 
$fuel_consumption = 12; 
$fuel_price = 70;
$travel_cost = ($distance / $fuel_consumption) * $fuel_price;
echo "<h2>12. Travel Cost Estimator</h2>";
echo "<p>Estimated Travel Cost: ₱" . round($travel_cost, 2) . "</p>";
?>
</body>
</html>
