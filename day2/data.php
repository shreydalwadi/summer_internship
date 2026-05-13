 <?php

    if($_POST)
    {
        $weight = $_POST['weight'];
        $height = $_POST['height'] / 100;

        $bmi = $weight / ($height * $height);

        echo "<div class='result'>";
        echo "<h2>BMI: " . round($bmi,2) . "</h2>";

        if($bmi < 18.5)
        {
            echo "<h3>Underweight</h3>";
        }
        elseif($bmi < 25)
        {
            echo "<h3>Normal Weight</h3>";
        }
        elseif($bmi < 30)
        {
            echo "<h3>Overweight</h3>";
        }
        else
        {
            echo "<h3>Obese</h3>";
        }

        echo "</div>";
    }

    ?>
