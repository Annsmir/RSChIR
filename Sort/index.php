<html lang="en">
<head>
    <title>Sorter page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<?php

// Сортировка Шелла - 25 вариант
function shell_Sort($my_array)
{
    $x = round(count($my_array)/2); // Выбираем набор расстояний - L/2
    while($x > 0) // Пока шаг расстояний ненулевой
    {
        for($i = $x; $i < count($my_array);$i++){
            $temp = $my_array[$i];
            $j = $i;
            while($j >= $x && $my_array[$j-$x] > $temp)
            {
                $my_array[$j] = $my_array[$j - $x];
                $j -= $x;
            }
            $my_array[$j] = $temp;
        }
        $x = round($x/2.2); // Уменьшаем шаг в 2.2 раза
    }
    return $my_array;
}


if(isset($_GET['array'])) // Считываем значения, переданные после параметра запроса array
{
    $array_str = $_GET['array']; // Преобразуем переданный массив в строку
    $array = explode(",", $array_str); // Преобразуем строку в массив строк по разделителю
    for ($i = 0; $i < count($array); $i++) {
        if (array_filter($array, 'is_numeric' )) { // Если элементы цифры
            $array[$i] = (int)$array[$i]; // Заполняем массив преобразованными к int элементами
        }
    }
    $new_array = shell_Sort($array); // Сортируем массив
    echo 'Original array: ' . implode(',', $array) . '<br>Sorted array: ' . implode(',', $new_array) . '<br>Done!';
}
else echo "Empty array!"; // Параметр не передан
?>

<p>
</body>
</html>