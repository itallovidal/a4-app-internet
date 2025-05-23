<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include dirname(__DIR__, 1) . '/partials/head.php'; ?>
    <link rel="stylesheet" href="<?= base_url('style/admin.css') ?>">
    <title>Página Admin</title>
</head>

<body>
    <div class="admin-container">
        <?php include dirname(__DIR__, 1) . '/partials/navbarAdmin.php'; ?>
        <main>

            <header class="content-wrapper-size admin">
                <h1 class="heading">Bem vindo, <?php echo $_SESSION['user']['name'] ?>!</h1>
                <p class="text-small">Esta é a página de administração do site.</p>
                <p class="text-small">Você pode gerenciar as novidades na tabela abaixo</p>
            </header>

            <article class="content-wrapper-size admin">
                <div class="flex-row flex-between">
                    <h2 class="heading">Gerenciar Novidades</h2>
                    <a class="btn-primary" href="<?php echo base_url('admin/news/create'); ?>">Adicionar Novidade</a>
                </div>
                <p class="text-small">Adicione, edite ou remova novidades do site.</p>
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($NewsList as $news): ?>
                                <tr>
                                    <td><?= $news->getName() ?></td>
                                    <td><?= $news->getDescription() ?></td>
                                    <td class="flex-row flex-center">
                                        <a href="<?= base_url("admin/news/delete?id=" . $news->getId()); ?>" class="btn-danger icon-button">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a href="<?php echo base_url('home'); ?>" class="icon-button">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </article>
        </main>
    </div>

</body>

</html>