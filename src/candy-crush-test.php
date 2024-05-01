<?php  
    require 'CandyCrushTest.php';
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
        .highlight{ 
            color:pink;
        }
        div{
            margin-bottom:3px;
        }
        .content {
            background-color: #272727;
            color: whitesmoke;
            padding:1em;
            font-family: monospace, monospace;
        }
        h3 {
            margin-bottom:.5em;
        }
    </style>
</head>
<body>
    <a href="/index.php">Back</a>
    <br>
    <h2>Test Results Candy Crush</h2>
    <?php
        $x = new CandyCrushTest();
        $x->test_all();
    ?>
    <script>
        function togglediv(button) {
            var div = button.nextElementSibling;
            div.style.display = div.style.display == "none" ? "block" : "none";
        }
    </script>
</body>
</html>

 