<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './partials/head.php'; ?>
    <link rel="stylesheet" href="/public/style/news.css">
    <title>Página News</title>
</head>

<body>
    <?php include './partials/navbar.php'; ?>

    <main>

        <article class="icecream-list-wrapper content-wrapper-size">
            <h1 class="heading">Ultimos Lançamentos</h1>

            <div class="card-list-preview">
                <div class="card-preview">
                    <picture>
                        <img src="./a4-app-internet/public/assets/icecreams/ice_cream_01.jpg" alt="">
                    </picture>
                    <div class="card-footer">
                        <p class="text-regular">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae explicabo modi commodi sit quod laudantium mollitia blanditiis neque, minima quam quia dolor id architecto saepe perferendis placeat deserunt non sint.</p>
                    </div>
                </div>

                <div class="card-preview">
                    <picture>
                        <img src="./a4-app-internet/public/assets/icecreams/ice_cream_01.jpg" alt="">
                    </picture>
                    <div class="card-footer">
                        <p class="text-regular">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae explicabo modi commodi sit quod laudantium mollitia blanditiis neque, minima quam quia dolor id architecto saepe perferendis placeat deserunt non sint.</p>
                    </div>
                </div>
            </div>

        </article>

        <article class="about-wrapper">
            <picture>
                <img src="./a4-app-internet/public/assets/index_banner.jpg" alt="">
            </picture>
            <div class="text-wrapper">
                <h1 class="heading">Uma nova Loja está por vir</h1>
                <p class="text-regular">Na Fábrica de Delícias, acreditamos que cada sabor tem o poder de despertar memórias e criar novos momentos especiais. Produzimos nossos sorvetes com ingredientes selecionados, muito carinho e um toque de criatividade que transforma o simples em inesquecível. </p>
                <p class="text-regular">Aqui, cada receita é pensada para encantar desde a primeira colherada até o último pedacinho. Nosso compromisso é entregar qualidade, frescor e um atendimento que faz você se sentir em casa.</p>
            </div>
        </article>

    </main>

    <?php include './partials/footer.php'; ?>
</body>

</html>