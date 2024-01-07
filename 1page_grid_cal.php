<?php
    $days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    $year = 2024;
    $date = new DateTime("$year-01-01");
    $arr = [];
    echo '<div class="cal">' . PHP_EOL;
    echo '<div class="year">' . PHP_EOL;
    echo $year;
    if (1 == $date->format('L')) echo '<br><span class="caption">(Leap Year)</span>'  . PHP_EOL;
    echo '</div>' . PHP_EOL;
    // Loop through each month of the input year
    for ($month = 1; $month <= 12; $month++) {
        // Create a DateTime object for the first day of each month
        $date = new DateTime("$year-$month-01");
        $day_of_the_week = $date->format('D');
        $arr[$day_of_the_week][] = $date->format('M');

     }
    echo '<div class="dates">';
    for ($i=1; $i < 32; $i++) { 
       echo '<div class="date">' . $i . '</div>' . PHP_EOL;
    }
    echo '</div>' . PHP_EOL;
    echo '<div class="months">' . PHP_EOL;
    for ($i=0; $i < 7; $i++) { 
        echo '<div class="month">';
        foreach ($arr[$days[$i]] as $key => $value) {
        echo  $value . ' ';

        }
       echo '</div>' . PHP_EOL;
    }
    echo '</div>' . PHP_EOL;

    echo '<div class="days">' . PHP_EOL;
    for ($i=0; $i < 7; $i++) { 
        for ($j=0; $j < 7; $j++) { 
            $idx = ($i + $j) % 7;
                echo '<div class="day ' . $days[$idx] . '">' . $days[$idx] . '</div>' ;  

        }

    }
    echo '</div>' . PHP_EOL;
    echo '</div>' . PHP_EOL;
?>
