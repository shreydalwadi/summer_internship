<?php
$students = [
    [
        "roll_no" => 101,
        "name" => "Aarav",
        "city" => "Ahmedabad",
        "marks" => [
            "PHP" => 78,
            "MySQL" => 82,
            "HTML" => 88,
            "JS" => 75,
            "Python" => 91
        ]
    ],
    [
        "roll_no" => 102,
        "name" => "Kiara",
        "city" => "Surat",
        "marks" => [
            "PHP" => 92,
            "MySQL" => 90,
            "HTML" => 94,
            "JS" => 89,
            "Python" => 95
        ]
    ],
    [
        "roll_no" => 103,
        "name" => "Rohan",
        "city" => "Rajkot",
        "marks" => [
            "PHP" => 45,
            "MySQL" => 50,
            "HTML" => 40,
            "JS" => 48,
            "Python" => 52
        ]
    ],
    [
        "roll_no" => 104,
        "name" => "Meera",
        "city" => "Vadodara",
        "marks" => [
            "PHP" => 66,
            "MySQL" => 71,
            "HTML" => 69,
            "JS" => 73,
            "Python" => 68
        ]
    ],
    [
        "roll_no" => 105,
        "name" => "Dev",
        "city" => "Bhavnagar",
        "marks" => [
            "PHP" => 30,
            "MySQL" => 35,
            "HTML" => 25,
            "JS" => 28,
            "Python" => 32
        ]
    ],
    [
        "roll_no" => 106,
        "name" => "Anaya",
        "city" => "Jamnagar",
        "marks" => [
            "PHP" => 85,
            "MySQL" => 87,
            "HTML" => 90,
            "JS" => 86,
            "Python" => 88
        ]
    ],
    [
        "roll_no" => 107,
        "name" => "Yash",
        "city" => "Gandhinagar",
        "marks" => [
            "PHP" => 55,
            "MySQL" => 60,
            "HTML" => 58,
            "JS" => 62,
            "Python" => 57
        ]
    ],
    [
        "roll_no" => 169,
        "name" => "Shrey",
        "city" => "anand",
        "marks" => [
            "PHP" => 98,
            "MySQL" => 96,
            "HTML" => 97,
            "JS" => 95,
            "Python" => 99
        ]
    ]
];
foreach($students as &$student){
    $total = array_sum($student['marks']);
    $percentage = $total / 5;
    if($percentage >= 90){
        $grade = "A+";
    }
    elseif($percentage >= 75){
        $grade = "A";
    }
    elseif($percentage >= 60){
        $grade = "B";
    }
    elseif($percentage >= 40){
        $grade = "C";
    }
    else{
        $grade = "F";
    }
    $student['total'] = $total;
    $student['percentage'] = $percentage;
    $student['grade'] = $grade;
}
usort($students, function($a, $b){
    return $b['percentage'] <=> $a['percentage'];
});
$percentages = array_column($students, 'percentage');
$classAverage = array_sum($percentages) / count($percentages);
$highest = max($percentages);
$lowest = min($percentages);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Result Sheet</title>
    <style>
        body{
            font-family: Arial;
            background:#f4f4f4;
            padding:20px;
        }
        h1{
            text-align:center;
            color:#333;
        }
        table{
            width:100%;
            border-collapse:collapse;
            background:white;
        }
        th, td{
            border:1px solid #ccc;
            padding:10px;
            text-align:center;
        }
        th{
            background:#222;
            color:white;
        }
        .gold{
            background:#FFD700;
        }
        .silver{
            background:#C0C0C0;
        }
        .bronze{
            background:#CD7F32;
            color:white;
        }
        .summary{
            background:#222;
            color:white;
            font-weight:bold;
        }
    </style>
</head>
<body>
<h1>Student Result Sheet Generator</h1>
<table>
    <tr>
        <th>Rank</th>
        <th>Roll No</th>
        <th>Name</th>
        <th>City</th>
        <th>PHP</th>
        <th>MySQL</th>
        <th>HTML</th>
        <th>JS</th>
        <th>Python</th>
        <th>Total</th>
        <th>Percentage</th>
        <th>Grade</th>
        <th>Status</th>
    </tr>
<?php
$rank = 1;
foreach($students as $student){
 if($student['percentage'] < 40){
        continue;
    }
$class = "";
if($rank == 1){
        $class = "gold";
    }
    elseif($rank == 2){
        $class = "silver";
    }
    elseif($rank == 3){
        $class = "bronze";
    }
?>
<tr class="<?php echo $class; ?>">
    <td><?php echo $rank; ?></td>
    <td><?php echo $student['roll_no']; ?></td>
    <td><?php echo $student['name']; ?></td>
     <td><?php echo $student['city']; ?></td>
    <td><?php echo $student['marks']['PHP']; ?></td>
    <td><?php echo $student['marks']['MySQL']; ?></td>
    <td><?php echo $student['marks']['HTML']; ?></td>
    <td><?php echo $student['marks']['JS']; ?></td>
    <td><?php echo $student['marks']['Python']; ?></td>
    <td><?php echo $student['total']; ?></td>
    <td>
        <?php echo number_format($student['percentage'],2); ?>%
    </td>
    <td><?php echo $student['grade']; ?></td>
    <td>
        <?php
            if($student['percentage'] >= 40){
                echo "PASS";
            }
            else{
                echo "FAIL";
            }
        ?>
        </td>

</tr>
<?php
$rank++;
}
?>
<tr class="summary">
<td colspan="10">CLASS SUMMARY</td>
    <td>
        Avg:
        <?php echo number_format($classAverage,2); ?>%
    </td>
    <td>
        High:
        <?php echo $highest; ?>%
        <br>
        Low:
        <?php echo $lowest; ?>%
    </td>
    <td>END</td>
</tr>
</table>
</body>
</html>