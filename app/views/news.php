<!DOCTYPE html>
<html lang="en">

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
                <div class="card-preview">
                    <picture>
                        <img src="<?= base_url('assets/icecreams/ice_cream_01.jpg') ?>" alt="">
                    </picture>
                    <div class="card-footer">
                        <p class="text-regular">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae explicabo modi commodi sit quod laudantium mollitia blanditiis neque, minima quam quia dolor id architecto saepe perferendis placeat deserunt non sint.</p>
                    </div>
                </div>

                <div class="card-preview">
                    <picture>
                        <img src="<?= base_url('assets/icecreams/ice_cream_01.jpg') ?>" alt="">
                    </picture>
                    <div class="card-footer">
                        <p class="text-regular">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae explicabo modi commodi sit quod laudantium mollitia blanditiis neque, minima quam quia dolor id architecto saepe perferendis placeat deserunt non sint.</p>
                    </div>
                </div>
            </div>

        </article>

        <article class="news-wrapper content-wrapper-size">
            <h1 class="heading">Novidades</h1>
            <div class="news-card">
                <picture>
                    <img src="<?= base_url('assets/icecreams/ice_cream_01.jpg') ?>" alt="">
                </picture>
                <div class="card-content">
                    <h1>Nome da noticia</h1>
                    <p class="text-description text-regular">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus.</p>

                    <a type="button" class="btn-primary"> Ver mais
                        <i class="fas fa chevron-right"></i>
                    </a>
                </div>
            </div>
        </article>

    </main>

    <?php include 'partials/footer.php'; ?>
</body>

</html>