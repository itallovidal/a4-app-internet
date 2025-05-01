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



    </main>

    <?php include 'partials/footer.php'; ?>
</body>

</html>