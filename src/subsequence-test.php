<?php  
    require 'TheSubsequencesTest.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Results SubSequnce</title>
    <style>
        .red{
            font-weight:bold;
            color:red;
        }
        .green{ 
            color:green;
            font-weight:bold;
        }
        div{
            margin-bottom:3px;
        }
        h3 {
            margin-bottom:.5em;
        }
    </style>
</head>
<body>
    <a href="/index.php">Back</a>
    <br>
    <h2>Test Results Subsequences</h2>
    <?php 
        $x = new TheSubsequencesTest();
        $x->test_all();
    ?>
</body>
</html>

 