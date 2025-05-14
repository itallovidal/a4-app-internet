<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'partials/head.php'; ?>
    <link rel="stylesheet" href="<?= base_url('style/admin.css') ?>">
    <title>Página administração de Novidades</title>
</head>

<body>
    <?php include 'partials/navbar.php'; ?>
    <main> 
        <form class="content-wrapper-size" action="">
            <div class="form-group">
                <label for="name">Nome da novidade</label>
                <input type="text" name="name" id="name" placeholder="Sorvete de baunilha" required>
            </div>

            <div class="form-group">
                <label for="name">Descrição da novidade</label>
                <input type="text" name="name" id="name" placeholder="Sorvete de baunilha" required>
            </div>

            <button type="submit">Salvar</button>
        </form>
    </main>
</body>

</html>