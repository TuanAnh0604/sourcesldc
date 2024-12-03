<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo"Hello PHP world <br>" ;
    $x = 10;
    $y = 11;
    echo"<br>Kết quả x + y = ". $x + $y;
    echo"<br>kết quả  x - y = " . $x - $y;
    echo"<br>Kết quả x * y = " . $x * $y ;
    echo"<br>Kết quả x / y = " . $x / $y ;
    echo"<br>Kết quả x++ = ". $x++ ;
    echo"<br>Kết quả ++x = " . ++$x ;
    echo"<br>";
    $num1 = 2;
    $num2 = 3;
    $em=20;
    if ($em<=20){
        echo"Đủ tuổi bầu cừ <br>";
    }else{
        echo" Chưa đủ tuổi <br>";
    }
    $num3 = 10;
    if ($num3 % 2 == 0){
    echo"Đây là số chẵn <br> ";
    }else {
    echo"Đây là số lẻ <br>";
    }
    if ($num3 > 0 ){
        echo" Đây là số dương <br>";
    }else{
        echo"Đây là số âm";
    }
    if ($num1 >= $num2 && $num1 >= $num3) {
        echo "Số lớn nhất là: " . $num1;
    } elseif ($num2 >= $num1 && $num2 >= $num3) {
        echo "Số lớn nhất là: " . $num2;
    } else {
        echo "Số lớn nhất là: " . $num3;
    }

    ?>
</body>
</html>