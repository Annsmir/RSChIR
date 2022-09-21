<html lang="en">
<head>
    <title>Drawer page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<?php

if(isset($_GET['num']))
{
    // Если введенная строка - это не число
    if(!is_numeric($_GET['num'])){
        echo 'Wrong input';
    }
    else {
        $number = (int)$_GET['num'];

        // Инициализируем данные при помощи побитового И и сдвига
        $Shape = $number & 3; // Всего 4 варианта форм с номерами от 0 до 3
        $Color = $number >> 1 & 3;
        $cx = $number >> 2 & 3;
        $cy = $number >> 3 & 3;

        echo '<div>'
            . 'Форма фигуры: '
            . $Shape, '<br>Цвет фигуры: '
            . $Color, '<br>Координата по x: '
            . $cx,'<br>Координата по y: ' .$cy
            . '</div>';

        //Минимальные значения фигуры при 0 размерах и вычисление координат
        $cx = 100 + $cx * 100;
        $cy = 100 + $cy * 100;


        //Выбор цвета
        switch($Color){
            case 0:
                $color = "yellow";
                break;
            case 1:
                $color = "red";
                break;
            case 2:
                $color = "blue";
                break;
            case 3:
                $color = "green";
                break;

        }

        /*
         * Как формируется svg изображение, в случае с тегом:
         * <svg w h>
         *      <Фигура со своими параметрами></>
         * </svg>
         */

        $svg_code = '<svg width = "' . $cx . '" height= "' . $cy . '">';
        switch($Shape){
            //Круг
            case 0:
                $cx>$cy?$cx=$cy:$cy=$cx;
                $svg_code .= '<circle cx="' . $cx / 2 . '" cy ="' . $cy / 2 . '" r="' . $cx / 2 . '" fill = "' . $color . '" />';
                break;
            //Эллипс
            case 1:
                $svg_code .= '<ellipse cx="' . $cx / 2 . '" cy ="' . $cy / 2 . '" rx="' . $cx / 2 . '" ry="' . $cy / 2 . '" fill = "' . $color . '" />';
                break;
            //Прямоугольник
            case 2:
                $svg_code .= '<rect x="0" y="0" width="' . $cx . '" height="' . $cy . '" fill="' . $color . '" />';
                break;
            //Квадрат
            case 3:
                $cx>$cy?$cx=$cy:$cy=$cx;
                $svg_code .= '<rect x="0" y="0" width="' . $cx . '" height="' . $cy . '" fill="' . $color . '" />';
                break;
        }

        $svg_code .= '</svg>';
        echo $svg_code;
    }

}
?>

<p>
</body>
</html>

