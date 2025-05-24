<nav class="flex-column nav-admin flex-center">
    <div class="flex-column flex-start">
        <?php $url = $_GET['url']; ?>
        <a class="text-regular <?= $url == 'admin/products' ? 'btn-primary' : 'btn-ghost'; ?>" href="<?php echo base_url('admin/products'); ?>">
            <i class="fa-solid fa-ice-cream"></i>
            Produtos</a>
        <a class="text-regular <?= $url == 'admin/news' ? 'btn-primary' : 'btn-ghost'; ?>" href="<?php echo base_url('admin/news'); ?>">
            <i class="fa-solid fa-newspaper"></i>
            Novidades</a>
        <a class="text-regular <?= $url == 'admin/users' ? 'btn-primary' : 'btn-ghost'; ?>" href="<?php echo base_url('admin/users'); ?>">
            <i class="fa-solid fa-user"></i>
            Admins</a>
        <a class="text-regular btn-ghost" href="?logout">
            <i class="fa-solid fa-right-from-bracket"></i>
            Sair</a>
    </div>
</nav>