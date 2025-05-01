<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'partials/head.php'; ?>
    <link rel="stylesheet" href="<?= base_url('style/products.css') ?>">
    <title>Página Sorvetes</title>
</head>

<body>
    <?php include 'partials/navbar.php'; ?>
    <div class="page-header">
        <div class="page-header-text-wrapper">
            <h1 class="hero">Fábrica de Delícias</h1>
            <h2 class="heading">Sonhos gelados feitos com amor</h2>
        </div>
        <picture class="page-header-image-wrapper">
            <img src="<?= base_url('assets/index_banner.jpg') ?>" alt="foto de sorvete">
        </picture>
    </div>
    <main>
        <article class="icecream-list-wrapper content-wrapper-size">
            <h1 class="heading">Nossos Sorvetes</h1>

            <div class="card-list">
                <?php foreach ($products as $product): ?>
                    <div class="icecream-card-wrapper">
                        <picture>
                            <img src="<?= $product->imageSrc() ?>" alt="">
                        </picture>
                        <div class="card-footer">
                            <p class="text-regular"><?= $product->getName() ?></p>
                            <p class="text-regular"><?= $product->getPrice() ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </article>

    </main>

    <?php include 'partials/footer.php'; ?>
</body>

</html>