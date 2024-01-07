<?php
function generateCalendar($year) {
    $days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    $date = new DateTime("$year-01-01");
    $arr = [];

    $output = '<div class="cal">' . PHP_EOL;
    $output .= '<div class="year">' . PHP_EOL;
    $output .= esc_html($year);
    if (1 == $date->format('L')) {
        $output .= '<br><span class="caption">(Leap Year)</span>'  . PHP_EOL;
    }
    $output .= '</div>' . PHP_EOL;

    for ($month = 1; $month <= 12; $month++) {
        $date = new DateTime("$year-$month-01");
        $day_of_the_week = $date->format('D');
        $arr[$day_of_the_week][] = $date->format('M');
    }

    // Rest of your existing calendar generation logic

    // Append months
    $output .= '<div class="months">' . PHP_EOL;
    for ($i = 0; $i < 7; $i++) {
        $output .= '<div class="month">';
        foreach ($arr[$days[$i]] as $key => $value) {
            $output .= esc_html($value) . ' ';
        }
        $output .= '</div>' . PHP_EOL;
    }
    $output .= '</div>' . PHP_EOL;

    // Append days of the week
    $output .= '<div class="days">' . PHP_EOL;
    for ($i = 0; $i < 7; $i++) {
        for ($j = 0; $j < 7; $j++) {
            $idx = ($i + $j) % 7;
            $output .= '<div class="day ' . esc_attr($days[$idx]) . '">' . esc_html($days[$idx]) . '</div>';
        }
    }
    $output .= '</div>' . PHP_EOL;

    $output .= '</div>' . PHP_EOL;

    echo $output; // Output the calendar HTML
}
