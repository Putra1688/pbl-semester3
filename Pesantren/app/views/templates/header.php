<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?? 'Pondok Pesantren Ashabul Kahfi' ?></title>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/style.css">
</head>
<body>
    <nav>
        <a href="<?= BASEURL ?>" class="logo">
            <img src="<?= BASEURL ?>/img/logo.png" alt="Logo" class="logo-icon">
            <span class="logo-text">ASHABUL KAHFI</span>
        </a>
        <div class="nav-links">
            <a href="<?= BASEURL ?>" class="<?= $data['title'] == 'Home' ? 'active' : '' ?>">Beranda</a>
            <a href="<?= BASEURL ?>/kegiatan" class="<?= $data['title'] == 'Kegiatan' ? 'active' : '' ?>">Kegiatan</a>
            <a href="<?= BASEURL ?>/profil" class="<?= $data['title'] == 'Profil' ? 'active' : '' ?>">Profil</a>
            <a href="<?= BASEURL ?>/contact" class="<?= $data['title'] == 'Contact' ? 'active' : '' ?>">Contact</a>
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="<?= BASEURL ?>/dashboard/<?= $_SESSION['role'] ?>" class="login-link">Dashboard</a>
                <a href="<?= BASEURL ?>/auth/logout" class="login-link">Logout</a>
            <?php else: ?>
                <a href="<?= BASEURL ?>/auth/login" class="login-link">Login</a>
            <?php endif; ?>
            <button class="theme-toggle">🌓</button>
        </div>
    </nav> -->