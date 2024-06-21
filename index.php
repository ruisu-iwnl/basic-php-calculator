<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Calculator</title>

</head>
<body>
<div class="container">
        <div class="calculator-form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-group">
                    <input type="number" class="form-control" name="num01" placeholder="Number One">
                </div>
                <div class="form-group">
                    <select class="form-control" name="operator">
                        <option value="add"> + </option>
                        <option value="sub"> - </option>
                        <option value="mul"> x </option>
                        <option value="div"> / </option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="num02" placeholder="Number Two">
                </div>
                <button type="submit" class="btn btn-primary">Calculate</button>
            </form>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        //grab data from user input
        $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);
        $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);
        $operator = htmlspecialchars($_POST["operator"]);

        //error handlers
        $errors = false;

        if (empty($num01) || empty($num02) || empty($operator)) {
            echo "<p class='error'> Fill in all fields! </p>";
            $errors = true;
        }
        if (!is_numeric($num01) || !is_numeric($num02)){
            echo "<p class='error'> Only write numbers! </p>";
            $errors = true;
        }

        //calculate time
        if (!$errors){
            $value=0;
            switch ($operator) {
                case "add":
                    $value = $num01 + $num02;
                break;
                case "sub":
                    $value = $num01 - $num02;
                break;
                case "mul":
                    $value = $num01 * $num02;
                break;
                case "div":
                    $value = $num01 / $num02;
                break;
                default:
                    echo "<p class='error'> May nangyari! </p>";
            }
            echo "<p class='result'> Ang tamang sagot ay = " . $value . "</p>";
            echo "<p class='note'> also bobo ka parin sa math haha</p>";
        }
    }
    ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>