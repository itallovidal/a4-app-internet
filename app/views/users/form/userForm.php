<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include dirname(__DIR__, 2) . '/partials/head.php'; ?>
    <link rel="stylesheet" href="<?= base_url('style/admin.css') ?>">
    <title>Página administração de Usuários</title>
</head>

<body>
    <?php include dirname(__DIR__, 2) . '/partials/navbar.php'; ?>
    <main>
        <form class="content-wrapper-size" action="" method="POST">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" placeholder="Insira o nome do usuário" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>   
                <input type="text" name="email" id="email" placeholder="Insira o seu e-mail" required>
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" placeholder="Insira sua senha" required minlength="8">
            </div>
            <div class="form-group">
                <label for="password-confirmation">Confirmação de senha</label>
                <input type="password" name="password-confirmation" id="password-confirmation" placeholder="Confirme sua senha" required minlength="8">
            </div>

            <button type="submit">Salvar</button>
        </form>
    </main>
</body>

</html>