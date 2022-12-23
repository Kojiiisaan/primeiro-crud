<?php

function sexCheck($input) {
    if($input == 0) {
        echo "Masculino";
    } else {
        echo "Feminino";
    }
}

function ageCheck($id, $connect) {
    $year_sql = "SELECT year(idade) FROM tb_crud WHERE id = $id";
    $month_sql = "SELECT month(idade) FROM tb_crud WHERE id = $id";
    $day_sql = "SELECT day(idade) FROM tb_crud WHERE id = $id";

    $result_year = mysqli_query($connect, $year_sql);
    $result_month = mysqli_query($connect, $month_sql);
    $result_day = mysqli_query($connect, $day_sql);

    $yearSQL = mysqli_fetch_array($result_year);
    $monthSQL = mysqli_fetch_array($result_month);
    $daySQL = mysqli_fetch_array($result_day);

    // date('Y-m-d');

    $todayYear = intval(date('Y'));
    $todayMonth = intval(date('m'));
    $today = intval(date('d'));

    if($yearSQL['0'] <= $todayYear){
    $yearDiff = $todayYear - $yearSQL['0'];

        if($monthSQL['0'] <= $todayMonth) {
            if($daySQL['0'] > $today) {
                $yearDiff = --$yearDiff;
        }
    }
}
    echo $yearDiff;
}