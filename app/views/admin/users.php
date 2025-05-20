<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include dirname(__DIR__, 1) .'/partials/head.php'; ?>
    <link rel="stylesheet" href="<?= base_url('style/admin.css') ?>">
    <title>Página Admin</title>
</head>

<body>
    <main>
        <?php include dirname(__DIR__, 1) . '/partials/navbarAdmin.php'; ?>
        
        <header class="content-wrapper-size admin">
            <h1 class="hero">Admin</h1>
            <p class="text-small">Esta é a página de administração do site.</p>
            <p class="text-small">Você pode gerenciar o conteúdo do site aqui.</p>
        </header>

        <article class="content-wrapper-size admin">
            <div class="flex-row flex-between">
                <h2 class="heading">Gerenciar Admins</h2>
                <a class="btn-primary" href="<?php echo base_url('userForm'); ?>">Adicionar Admin</a>
            </div>
            <p class="text-small">Adicione, edite ou remova admins do sistema.</p>
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
                        <?php foreach ($usersList as $user): ?>
                            <tr>
                                <td><?= $user->getName() ?></td>
                                <td><?= $user->getEmail() ?></td>
                                <td><?= $user->getPassword() ?></td>
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