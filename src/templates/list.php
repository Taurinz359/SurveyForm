<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/style/style.css">
    <title>list</title>
</head>

<body>
    <ul>
        <?php foreach ($data['files'] as $file) : ?>
            <li>
                <form method='get' action='/survey/'>
                    <input type='hidden'>
                    <a href="<?= $file ?>" class="submit-button" id="post-file"><?= $file ?></a>
                    <!-- <button class="submit-button" type='submit'><?= $file ?></button>  -->
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

</body>

</html>