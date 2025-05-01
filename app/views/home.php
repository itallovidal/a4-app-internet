<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'partials/head.php'; ?>
    <link rel="stylesheet" href="<?= base_url('style/index.css') ?>">
    <title>Página Home</title>
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
            <h1 class="heading">Lançamentos Recentes</h1>

            <div class="card-list">

            <?php foreach ($newerIcecreams as $icecream): ?>
                <div class="icecream-card-wrapper">
                    <picture>
                        <img src="<?= $icecream->imageSrc() ?>" alt="">
                    </picture>
                    <div class="card-footer">
                        <p class="text-regular"><?= $icecream->getName() ?></p>
                        <p class="text-regular"><?= $icecream->getPrice() ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>

            <a href="<?= base_url('products'); ?>" class="btn-primary">ver mais sorvetes</a>
        </article>

        <article class="about-wrapper">
            <picture>
                <img src="<?= base_url('assets/index_banner.jpg') ?>" alt="">
            </picture>
            <div class="text-wrapper">
                <h1 class="heading">Sobre nós</h1>
                <p class="text-regular">Na Fábrica de Delícias, acreditamos que cada sabor tem o poder de despertar memórias e criar novos momentos especiais. Produzimos nossos sorvetes com ingredientes selecionados, muito carinho e um toque de criatividade que transforma o simples em inesquecível. </p>
                <p class="text-regular">Aqui, cada receita é pensada para encantar desde a primeira colherada até o último pedacinho. Nosso compromisso é entregar qualidade, frescor e um atendimento que faz você se sentir em casa.</p>
                <a href="<?= base_url('about'); ?>" class="btn-primary">Saiba mais</a>
            </div>
        </article>

        <article class="shop-wrapper">
            <div class="text-wrapper">
                <h1 class="heading">Loja Nova!</h1>
                <p class="text-regular">Na Fábrica de Delícias, acreditamos que cada sabor tem o poder de despertar memórias e criar novos momentos especiais. Produzimos nossos sorvetes com ingredientes selecionados, muito carinho e um toque de criatividade que transforma o simples em inesquecível. </p>
                <p class="text-regular">Aqui, cada receita é pensada para encantar desde a primeira colherada até o último pedacinho. Nosso compromisso é entregar qualidade, frescor e um atendimento que faz você se sentir em casa.</p>
                <a href="<?= base_url('news'); ?>" class="btn-primary">Saiba mais</a>
            </div>
            <picture>
                <img src="<?= base_url('assets/index_banner.jpg') ?>" alt="">
            </picture>
        </article>
    </main>

    <?php include 'partials/footer.php'; ?>
</body>
</html>