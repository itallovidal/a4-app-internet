<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include 'partials/head.php'; ?>
    <link rel="stylesheet" href="<?= base_url('style/login.css') ?>">
    <title>Página Login</title>
</head>

<body>

    <main class="login-page flex-center">
        <?php include 'partials/navbar.php'; ?>
        <form action="" method="post" class="content-wrapper-size">
            <div class="flex-column flex-center">
                <h1 class="heading">Painel Administrativo</h1>
                <p class="text-small" style="color: red;"><?php echo isset($_GET['expired']) ? 'Sessão expirada' : ''; ?></p>
                <p class="text-small" style="color: red;"><?php echo isset($_GET['incorrect']) ? 'Email ou senha inválidos' : ''; ?></p>
            </div>
            <div class="flex-column flex-center">
                <input type="email" name="email" id="email" placeholder="Email" required>
                <input type="password" name="password" id="password" placeholder="Senha" required>
                <button class="btn-primary" type="submit">Entrar</button>
            </div>
        </form>
    </main>

    <?php include 'partials/footer.php'; ?>
</body>

</html>