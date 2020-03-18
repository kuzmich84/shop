<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все товары на сайте</title>
    <meta name="description" content="Главная страница сайта"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/main.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/product.css" type="text/css" charset="utf-8">
</head>
<body>
<?php require_once 'public/blocks/header.php'; ?>

<div class="container main">
    <h1><?= $data['title'] ?></h1>
    <div class="products">
        <?php for ($i = 0; $i < count($data['products']); $i++): ?>
            <div class="product">
                <div class="image">
                    <img src="/public/img/<?= $data['products'][$i]['img'] ?>"
                         alt="<?= $data['products'][$i]['title'] ?>">
                </div>
                <h3><?= $data['products'][$i]['title'] ?></h3>
                <p><?= $data['products'][$i]['anons'] ?></p>
                <a href="/product/<?= $data['products'][$i]['id'] ?>">
                    <button class="btn">Детальнее</button>
                </a>
            </div>
        <?php endfor; ?>
    </div>
    <ul class="pagination">
        <?php

        for ($i = 1; $i <= $data['total']; $i++) {
            if ($i === 1) {
                $param = '/categories/';
            } else {
                $param = '/categories/'.$i;
            }

            echo "<li><a href=" . $param . ">" . $i . " </a></li>";
        } ?>

    </ul>


</div>

<?php require_once 'public/blocks/footer.php'; ?>
</body>
</html>