<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include 'partials/head.php'; ?>
    <link rel="stylesheet" href="<?= base_url('style/news.css') ?>">
    <title>Página News</title>
</head>

<body>
    <?php include 'partials/navbar.php'; ?>

    <main>
        <article class="icecream-list-wrapper content-wrapper-size">
            <h1 class="heading">Ultimos Lançamentos</h1>

            <div class="card-list-preview">
                <?php foreach ($newerIcecreams as $icecream): ?>
                    <div class="card-preview">
                        <picture>
                            <img src="<?= $icecream->imageSrc() ?>" alt="">
                        </picture>
                        <div class="card-content news-wrapper">
                            <h1><?= $icecream->getName() ?></h1>
                            <p class="text-regular content-wrapper-size"><?= $icecream->getDescription() ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </article>

        <article class="news-wrapper content-wrapper-size">
            <h1 class="heading">Novidades</h1>
            <div class="news-list">
            <?php foreach ($newerNews as $new): ?>
                <div class="news-card">
                    <picture>
                        <img src="<?= $new->imageSrc() ?>" alt="">
                    </picture>
                    <div class="card-content">
                        <h1><?= $new->getName() ?></h1>
                        <p class="text-description text-regular"><?= $new->getDescription() ?></p>

                        <a class="btn-primary" href=""> Ver mais
                            <i class="fas fa chevron-right"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </article>

    </main>

    <?php include 'partials/footer.php'; ?>
</body>

</html>