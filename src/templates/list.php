<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/style.css">
    <title>list</title>
</head>
<body>
    <?php
        $path = __DIR__ . '/../../storage';
        if ($open = scandir($path)) {
            foreach ($open as $k => $v) {
                if ($v != "." && $v != "..") {
                    echo "<a href = {$v} class  = submit-button>{$v}</a>";
                }
            }
        }
    ?>
</body>
</html>