<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP Exercises with User Input</title>
  <link rel="stylesheet" href="style.css">
</head>

<style>
    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      color: #333;
      margin: 0;
      padding: 40px;
      line-height: 1.6;
      position: relative;
      z-index: 1;
      background-image: url('https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExMnZ1cTB1ampleTRjbGNjbGF1YW14ZHBkYmxsbHB5cWJ3dTQyYmZ3aSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/3xoal3NeaZKX243CvH/giphy.gif');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    body::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.4);
      z-index: -1;
    }

    h2 {
      color: #e32211;
      border-left: 5px solid #ff3b30;
      padding-left: 10px;
      margin-top: 40px;
      margin-bottom: 15px;
    }

    form {
      background: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
      margin-bottom: 25px;
    }

    input[type="text"],
    input[type="number"] {
      width: 220px;
      padding: 8px;
      margin: 6px 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
    }

    input[type="submit"] {
      background-color: #ff3b30;
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
      transition: background-color 0.2s ease;
    }

    input[type="submit"]:hover {
      background-color: #d82a1e;
    }

    p {
      background: #ffffff;
      padding: 12px 18px;
      border-radius: 6px;
      box-shadow: 0 1px 4px rgba(0,0,0,0.1);
      margin-top: 10px;
      font-size: 15px;
    }

    @media (max-width: 600px) {
      body {
        padding: 20px;
      }
      
      input[type="text"],
      input[type="number"] {
        width: 100%;
        margin: 6px 0;
      }
      
      form {
        padding: 15px;
      }
    }
  </style>

<body>

<?php
function get_post_value(string $key): string
{
    return htmlspecialchars($_POST[$key] ?? '');
}
function safe_html_output($value): string
{
    return htmlspecialchars((string)$value);
}

echo "<h2>1. Introduce Yourself</h2>";
?>
<form method="post">
  Name: <input type="text" name="name" value="<?= get_post_value('name'); ?>"><br>
  Age: <input type="number" name="age" value="<?= get_post_value('age'); ?>"><br>
  Favorite Color: <input type="text" name="fav_color" value="<?= get_post_value('fav_color'); ?>"><br>
  <input type="submit" name="intro_submit" value="Submit">
</form>
<?php
if (isset($_POST['intro_submit'])) {
  $name = trim(filter_input(INPUT_POST, 'name', FILTER_DEFAULT)); 
  $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
  $fav_color = trim(filter_input(INPUT_POST, 'fav_color', FILTER_DEFAULT)); 

  if ($name && $age !== false && $fav_color) {
    echo "<p>Hi, I'm " . safe_html_output($name) . ", I am " . safe_html_output($age) . " years old, and my favorite color is " . safe_html_output($fav_color) . ".</p>";
  } else {
    echo "<p style='color: red;'>Please provide a valid name, age, and favorite color.</p>";
  }
}

echo "<h2>2. Simple Math</h2>";
?>
<form method="post">
  A: <input type="number" name="a" step="any" value="<?= get_post_value('a'); ?>">
  B: <input type="number" name="b" step="any" value="<?= get_post_value('b'); ?>">
  <input type="submit" name="math_submit" value="Calculate">
</form>
<?php
if (isset($_POST['math_submit'])) {
  $a = filter_input(INPUT_POST, 'a', FILTER_VALIDATE_FLOAT);
  $b = filter_input(INPUT_POST, 'b', FILTER_VALIDATE_FLOAT);

  if ($a !== false && $b !== false) {
    echo "<p>Sum: " . safe_html_output($a + $b) . "<br>";
    echo "Difference: " . safe_html_output($a - $b) . "<br>";
    echo "Product: " . safe_html_output($a * $b) . "<br>";
    if ($b != 0) {
      echo "Quotient: " . safe_html_output($a / $b) . "</p>";
    } else {
      echo "Quotient: Cannot divide by zero.</p>";
    }
  } else {
    echo "<p style='color: red;'>Please enter valid numbers for A and B.</p>";
  }
}

echo "<h2>3. Area and Perimeter of a Rectangle</h2>";
?>
<form method="post">
  Length: <input type="number" step="any" name="length" value="<?= get_post_value('length'); ?>">
  Width: <input type="number" step="any" name="width" value="<?= get_post_value('width'); ?>">
  <input type="submit" name="rect_submit" value="Calculate">
</form>
<?php
if (isset($_POST['rect_submit'])) {
  $length = filter_input(INPUT_POST, 'length', FILTER_VALIDATE_FLOAT);
  $width = filter_input(INPUT_POST, 'width', FILTER_VALIDATE_FLOAT);

  if ($length !== false && $width !== false && $length >= 0 && $width >= 0) {
    $area = $length * $width;
    $perimeter = 2 * ($length + $width);
    echo "<p>Area: " . safe_html_output($area) . "<br>Perimeter: " . safe_html_output($perimeter) . "</p>";
  } else {
    echo "<p style='color: red;'>Please enter valid non-negative numbers for Length and Width.</p>";
  }
}

echo "<h2>4. Temperature Converter</h2>";
?>
<form method="post">
  Celsius: <input type="number" name="celsius" step="any" value="<?= get_post_value('celsius'); ?>">
  <input type="submit" name="temp_submit" value="Convert">
</form>
<?php
if (isset($_POST['temp_submit'])) {
  $c = filter_input(INPUT_POST, 'celsius', FILTER_VALIDATE_FLOAT);

  if ($c !== false) {
    $f = ($c * 9/5) + 32;
    echo "<p>" . safe_html_output($c) . " °C = " . safe_html_output(round($f, 2)) . " °F</p>";
  } else {
    echo "<p style='color: red;'>Please enter a valid number for Celsius.</p>";
  }
}

echo "<h2>5. Swapping Variables</h2>";
?>
<form method="post">
  X: <input type="number" step="any" name="x" value="<?= get_post_value('x'); ?>">
  Y: <input type="number" step="any" name="y" value="<?= get_post_value('y'); ?>">
  <input type="submit" name="swap_submit" value="Swap">
</form>
<?php
if (isset($_POST['swap_submit'])) {
  $x = filter_input(INPUT_POST, 'x', FILTER_VALIDATE_FLOAT);
  $y = filter_input(INPUT_POST, 'y', FILTER_VALIDATE_FLOAT);

  if ($x !== false && $y !== false) {
    $temp = $x;
    $x = $y;
    $y = $temp;
    echo "<p>After swapping: x = " . safe_html_output($x) . ", y = " . safe_html_output($y) . "</p>";
  } else {
    echo "<p style='color: red;'>Please enter valid numbers for X and Y.</p>";
  }
}

echo "<h2>6. Salary Calculator</h2>";
?>
<form method="post">
  Basic Salary: <input type="number" step="any" name="basic" value="<?= get_post_value('basic'); ?>">
  Allowance: <input type="number" step="any" name="allowance" value="<?= get_post_value('allowance'); ?>">
  Deduction: <input type="number" step="any" name="deduction" value="<?= get_post_value('deduction'); ?>">
  <input type="submit" name="salary_submit" value="Compute">
</form>
<?php
if (isset($_POST['salary_submit'])) {
  $basic = filter_input(INPUT_POST, 'basic', FILTER_VALIDATE_FLOAT);
  $allow = filter_input(INPUT_POST, 'allowance', FILTER_VALIDATE_FLOAT);
  $deduct = filter_input(INPUT_POST, 'deduction', FILTER_VALIDATE_FLOAT);

  if ($basic !== false && $allow !== false && $deduct !== false && $basic >= 0 && $allow >= 0 && $deduct >= 0) {
    $net = $basic + $allow - $deduct;
    echo "<p>Net Salary: ₱" . safe_html_output(round($net, 2)) . "</p>";
  } else {
    echo "<p style='color: red;'>Please enter valid non-negative numbers for Basic Salary, Allowance, and Deduction.</p>";
  }
}

echo "<h2>7. BMI Calculator</h2>";
?>
<form method="post">
  Weight (kg): <input type="number" step="any" name="weight" value="<?= get_post_value('weight'); ?>">
  Height (m): <input type="number" step="any" name="height" value="<?= get_post_value('height'); ?>">
  <input type="submit" name="bmi_submit" value="Calculate">
</form>
<?php
if (isset($_POST['bmi_submit'])) {
  $w = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT);
  $h = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_FLOAT);

  if ($w !== false && $h !== false && $w > 0 && $h > 0) {
    $bmi = $w / ($h * $h);
    echo "<p>BMI: " . safe_html_output(round($bmi, 2)) . "</p>";
  } else {
    echo "<p style='color: red;'>Please enter valid positive numbers for Weight and Height.</p>";
  }
}

echo "<h2>8. String Manipulation</h2>";
?>
<form method="post">
  Enter Sentence: <input type="text" name="sentence" value="<?= get_post_value('sentence'); ?>">
  <input type="submit" name="string_submit" value="Analyze">
</form>
<?php
if (isset($_POST['string_submit'])) {
  $s = trim(filter_input(INPUT_POST, 'sentence', FILTER_DEFAULT));

  if ($s) {
    echo "<p>Sentence: " . safe_html_output($s) . "<br>";
    echo "Characters: " . safe_html_output(strlen($s)) . "<br>";
    echo "Words: " . safe_html_output(str_word_count($s)) . "<br>";
    echo "Uppercase: " . safe_html_output(strtoupper($s)) . "<br>";
    echo "Lowercase: " . safe_html_output(strtolower($s)) . "</p>";
  } else {
    echo "<p style='color: red;'>Please enter a sentence.</p>";
  }
}

echo "<h2>9. Bank Account Simulation</h2>";
?>
<form method="post">
  Balance: <input type="number" step="any" name="balance" value="<?= get_post_value('balance'); ?>">
  Deposit: <input type="number" step="any" name="deposit" value="<?= get_post_value('deposit'); ?>">
  Withdraw: <input type="number" step="any" name="withdraw" value="<?= get_post_value('withdraw'); ?>">
  <input type="submit" name="bank_submit" value="Update Balance">
</form>
<?php
if (isset($_POST['bank_submit'])) {
  $bal = filter_input(INPUT_POST, 'balance', FILTER_VALIDATE_FLOAT);
  $dep = filter_input(INPUT_POST, 'deposit', FILTER_VALIDATE_FLOAT);
  $wd = filter_input(INPUT_POST, 'withdraw', FILTER_VALIDATE_FLOAT);

  if ($bal !== false && $dep !== false && $wd !== false && $bal >= 0 && $dep >= 0 && $wd >= 0) {
    $final = $bal + $dep - $wd;
    echo "<p>Final Balance: ₱" . safe_html_output(round($final, 2)) . "</p>";
  } else {
    echo "<p style='color: red;'>Please enter valid non-negative numbers for Balance, Deposit, and Withdraw.</p>";
  }
}

echo "<h2>10. Simple Grading System</h2>";
?>
<form method="post">
  Math: <input type="number" name="math" value="<?= get_post_value('math'); ?>">
  English: <input type="number" name="english" value="<?= get_post_value('english'); ?>">
  Science: <input type="number" name="science" value="<?= get_post_value('science'); ?>">
  <input type="submit" name="grade_submit" value="Compute">
</form>
<?php
if (isset($_POST['grade_submit'])) {
  $math = filter_input(INPUT_POST, 'math', FILTER_VALIDATE_INT);
  $eng = filter_input(INPUT_POST, 'english', FILTER_VALIDATE_INT);
  $sci = filter_input(INPUT_POST, 'science', FILTER_VALIDATE_INT);

  if ($math !== false && $eng !== false && $sci !== false && $math >= 0 && $math <= 100 && $eng >= 0 && $eng <= 100 && $sci >= 0 && $sci <= 100) {
    $avg = ($math + $eng + $sci) / 3;

    if ($avg >= 90) $grade = "A";
    elseif ($avg >= 80) $grade = "B";
    elseif ($avg >= 70) $grade = "C";
    elseif ($avg >= 60) $grade = "D";
    else $grade = "F";

    echo "<p>Average: " . safe_html_output(round($avg, 2)) . "<br>Grade: " . safe_html_output($grade) . "</p>";
  } else {
    echo "<p style='color: red;'>Please enter valid grades (0-100) for Math, English, and Science.</p>";
  }
}

echo "<h2>11. Currency Converter</h2>";
?>
<form method="post">
  PHP Amount: <input type="number" step="any" name="php_amount" value="<?= get_post_value('php_amount'); ?>">
  <input type="submit" name="currency_submit" value="Convert">
</form>
<?php
if (isset($_POST['currency_submit'])) {
  $php = filter_input(INPUT_POST, 'php_amount', FILTER_VALIDATE_FLOAT);

  if ($php !== false && $php >= 0) {
    define('USD_RATE', 0.017);
    define('EUR_RATE', 0.016);
    define('JPY_RATE', 2.68);

    echo "<p>₱" . safe_html_output($php) . " = $" . safe_html_output(round($php * USD_RATE, 2)) . " USD<br>";
    echo "₱" . safe_html_output($php) . " = €" . safe_html_output(round($php * EUR_RATE, 2)) . " EUR<br>";
    echo "₱" . safe_html_output($php) . " = ¥" . safe_html_output(round($php * JPY_RATE, 2)) . " JPY</p>";
  } else {
    echo "<p style='color: red;'>Please enter a valid non-negative PHP amount.</p>";
  }
}

echo "<h2>12. Travel Cost Estimator</h2>";
?>
<form method="post">
  Distance (km): <input type="number" step="any" name="distance" value="<?= get_post_value('distance'); ?>">
  Fuel Consumption (km/L): <input type="number" step="any" name="fuel_con" value="<?= get_post_value('fuel_con'); ?>">
  Fuel Price (₱/L): <input type="number" step="any" name="fuel_price" value="<?= get_post_value('fuel_price'); ?>">
  <input type="submit" name="travel_submit" value="Estimate">
</form>
<?php
if (isset($_POST['travel_submit'])) {
  $d = filter_input(INPUT_POST, 'distance', FILTER_VALIDATE_FLOAT);
  $f = filter_input(INPUT_POST, 'fuel_con', FILTER_VALIDATE_FLOAT);
  $p = filter_input(INPUT_POST, 'fuel_price', FILTER_VALIDATE_FLOAT);

  if ($d !== false && $f !== false && $p !== false && $d >= 0 && $f > 0 && $p >= 0) {
    $cost = ($d / $f) * $p;
    echo "<p>Estimated Travel Cost: ₱" . safe_html_output(round($cost, 2)) . "</p>";
  } else {
    echo "<p style='color: red;'>Please enter valid non-negative numbers for Distance and Fuel Price, and a positive number for Fuel Consumption.</p>";
  }
}
?>

</body>
</html>
