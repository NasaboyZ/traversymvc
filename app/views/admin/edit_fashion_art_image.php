<?php require APPROOT . '/views/inc/head/head.admin-dashboard.php'; ?>

<body>
    <div class="grid-container">
        <div class="menu-icon">
            <i class="fas fa-bars header__menu"></i>
        </div>

        <header class="header">
            <div class="header__avatar"><a class="dashboard-link" href="<?php echo URLROOT; ?>/admin/dashboard">Welcome <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</a></div>
        </header>

        <aside class="sidenav">
            <h2 class="title__sidenav"><a href="<?php echo URLROOT; ?>/admin/dashboard">Mue Wear Collectiv</a></h2>
            <div class="sidenav__close-icon">
                <i class="fas fa-times sidenav__brand-close"></i>
            </div>
            <ul class="sidenav__list">
                <li class="sidenav__list-item">
                    <span onclick="toggleSubMenu(this)">Landing Page</span>
                    <ul class="sub-menu">
                        <li class="sub-menu__item"><a href="<?php echo URLROOT; ?>/admin/newsbanner">News Banner</a></li>
                    </ul>
                </li>
                <li class="sidenav__list-item">
                    <span onclick="toggleSubMenu(this)">Fashion & Art</span>
                    <ul class="sub-menu">
                        <li class="sub-menu__item"><a href="<?php echo URLROOT;?>/admin/fashionandbranding">AI Gen</a></li>
                    </ul>
                </li>
                <li class="sidenav__list-item">
                    <span onclick="toggleSubMenu(this)">Community</span>
                    <ul class="sub-menu">
                        <li class="sub-menu__item"><a href="<?php echo URLROOT; ?>/admin/createBlogpost">Blog Post erstellen</a></li>
                    </ul>
                </li>
                <li class="sidenav__list-item">
                    <span onclick="toggleSubMenu(this)">Regristire Admin</span>
                    <ul class="sub-menu">
                        <li class="sub-menu__item"><a href="<?php echo URLROOT;?>/admin/registerAdmin">Regristieren</a></li>
                    </ul>
                </li>
            </ul>
            <div class="sidenav__logout">
                <a href="<?php echo URLROOT; ?>/admin/logout" class="btn-logout">Logout</a>
            </div>
        </aside>

        <main class="main">
            <div class="main-cards">
                <div class="card">
                    <h2>Fashion & Art Bild Bearbeiten</h2>
                    <form action="<?php echo URLROOT; ?>/admin/editFashionArtImage/<?php echo $data['id']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Titel: <sup>*</sup></label>
                            <input type="text" name="title" class="form-control" value="<?php echo isset($data['title']) ? $data['title'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Beschreibung: <sup>*</sup></label>
                            <textarea name="description" class="form-control"><?php echo isset($data['description']) ? $data['description'] : ''; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Bild:</label>
                            <input type="file" name="image" class="form-control">
                            <?php if (!empty($data['file_path'])): ?>
                                <img src="<?php echo URLROOT . '/uploads/' . htmlspecialchars(basename($data['file_path'])); ?>" alt="<?php echo htmlspecialchars($data['title']); ?>" class="fashion-art-img">
                            <?php endif; ?>
                        </div>
                        <input type="submit" class="btn" value="Speichern">
                    </form>
                </div>
            </div>
        </main>

        <footer class="footer">
            <div class="footer__copyright">&copy; 2024 Josef Leite</div>
        </footer>
    </div>
    <script src="<?php echo URLROOT; ?>/js/admin-dashboard.js"></script>
</body>
</html>
