<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'partials/head.php'; ?>
    <link rel="stylesheet" href="<?= base_url('style/admin.css') ?>">
    <title>Página Admin</title>
</head>

<body>
    <?php include 'partials/navbar.php'; ?>
    <main>
        <header class="content-wrapper-size admin">
            <h1 class="hero">Admin</h1>
            <p>Esta é a página de administração do site.</p>
            <p>Você pode gerenciar o conteúdo do site aqui.</p>
        </header>
        <article class="content-wrapper-size admin">
            <div class="flex-row flex-between">
                <h2 class="heading">Gerenciar Produtos</h2>
                <a class="btn-primary" href="<?php echo base_url('home'); ?>">Adicionar Produto</a>
            </div>
            <p>Adicione, edite ou remova produtos do site.</p>
            <div class="table-wrapper">
                <table>
                    <thead class="">
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($icecreamList as $icecream): ?>
                            <tr>
                                <td><?= $icecream->getName() ?></td>
                                <td><?= $icecream->getDescription() ?></td>
                                <td>R$<?= $icecream->getPrice() ?></td>
                                <td class="flex-row flex-center">
                                    <a href="<?php echo base_url('home'); ?>" class="btn-danger icon-button">
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

        <article class="content-wrapper-size admin">
            <div class="flex-row flex-between">
                <h2>Gerenciar Novidades</h2>
                <a class="btn-primary" href="<?php echo base_url('home'); ?>">Adicionar Produto</a>
            </div>
            <p>Adicione, edite ou remova novidades do site.</p>
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
                                    <a href="<?php echo base_url('home'); ?>" class="btn-danger icon-button">
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

        <article class="content-wrapper-size admin">
            <div class="flex-row flex-between">
                <h2>Gerenciar Admins</h2>
                <a class="btn-primary" href="<?php echo base_url('home'); ?>">Adicionar Produto</a>
            </div>
            <p>Adicione, edite ou remova admins do sistema.</p>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Senha</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($userList as $user): ?>
                            <tr>
                                <td><?= $user->getName() ?></td>
                                <td><?= $user->getEmail() ?></td>
                                <td><?= $user->getPasswordHash() ?></td>
                                <td class="flex-row flex-center">
                                    <a href="<?php echo base_url('home'); ?>" class="btn-danger icon-button">
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
</body>

</html>