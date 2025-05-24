<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include dirname(__DIR__, 1) . '/partials/head.php'; ?>
    <link rel="stylesheet" href="<?= base_url('style/admin.css') ?>">
    <title>Página administração de Usuários</title>
</head>

<body>
    <main class="form-wrapper">
        <div class="form-container">
            <header class="flex-row flex-center">
                <a href="<?php echo base_url('admin/users') ?>">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <h1 class="heading">Gerenciar Admin</h1>
            </header>
            <form class="content-wrapper-size flex-column flex-center" action="" method="POST">
                <?php $id_exits = isset($_GET['id']); ?>
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" placeholder="Insira o nome do usuário" value="<?= $id_exits ? $user->getName() : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email" placeholder="Insira o e-mail" value="<?= $id_exits ? $user->getEmail() : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" placeholder="Insira a senha" value="<?= $id_exits ? $user->getPassword() : ''; ?>"required minlength="8">
                </div>
                <div class="form-group">
                    <label for="password-confirmation">Confirmação de senha</label>
                    <input type="password" name="password-confirmation" id="password-confirmation" placeholder="Confirme a senha" required minlength="8">
                </div>

                <button type="submit" class="btn-primary">Salvar</button>
            </form>
        </div>
    </main>
</body>

</html>