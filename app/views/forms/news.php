<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include dirname(__DIR__, 1) . '/partials/head.php'; ?>
    <link rel="stylesheet" href="<?= base_url('style/admin.css') ?>">
    <title>Página administração de notícias</title>
</head>

<body>
    <main class="form-wrapper">
        <div class="form-container">
            <header class="flex-row flex-center">
                <a href="<?php echo base_url('admin/news') ?>">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <h1 class="heading">Gerenciar Notícias</h1>
            </header>
            <form class="content-wrapper-size flex-column flex-center" action="" method="POST">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" placeholder="Insira o nome da notícia" required>
                </div>

                <div class="form-group">
                    <label for="description">Descrição</label>
                    <input type="text" name="description" id="description" placeholder="Insira a descrição da notícia" required>
                </div>

                <div class="form-group">
                    <label for="imageSrc">URL da imagem</label>
                    <input type="url" name="imageSrc" id="imageSrc" placeholder="Insira a url da imagem" required>
                </div>

                <button type="submit" class="btn-primary">Salvar</button>
            </form>
        </div>
    </main>
</body>

</html>