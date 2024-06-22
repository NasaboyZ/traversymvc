<?php require APPROOT . '/views/inc/head/head.admin-blogpost.php'; ?>

<body>
    <div class="grid-container">
        <div class="menu-icon">
            <i class="fas fa-bars header__menu"></i>
        </div>

        <header class="header">
            <div class="header__avatar"><a  href="<?php echo URLROOT; ?>admin/dashboard">Welcome <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</a></div>
        </header>

        <aside class="sidenav">
      <h2 class="title__sidenav"><a class="dashboard-link" href="<?php echo URLROOT; ?>admin/admin-dashboard">Mue Wear Collectiv</a></h2>
      <div class="sidenav__close-icon">
        <i class="fas fa-times sidenav__brand-close"></i>
      </div>
      <ul class="sidenav__list">
        <li class="sidenav__list-item">
          <span onclick="toggleSubMenu(this)">Landing Page</span>
          <ul class="sub-menu">
            <li class="sub-menu__item"><a href="<?php echo URLROOT; ?>admin/newsbanner">News Banner</a></li>
          </ul>
        </li>
        <li class="sidenav__list-item">
          <span onclick="toggleSubMenu(this)">Fashion & Art</span>
          <ul class="sub-menu">
            <li class="sub-menu__item"><a href="<?php echo URLROOT;?>admin/fashionandbranding">AI Gen</a></li>
          </ul>
        </li>
        <li class="sidenav__list-item">
      <span onclick="toggleSubMenu(this)">Community</span>
    <ul class="sub-menu">
        <li class="sub-menu__item"><a href="<?php echo URLROOT; ?>admin/adminBlogPost">Blog Post erstellen</a></li>
    </ul>
</li>
        <li class="sidenav__list-item">
          <span onclick="toggleSubMenu(this)">Regristire Admin</span>
          <ul class="sub-menu">
            <li class="sub-menu__item"><a href="<?php echo URLROOT;?>admin/registerAdmin">Regristieren</a></li>
          </ul>
        </li>
      </ul>
      <div class="sidenav__logout">
        <a href="<?php echo URLROOT; ?>admin/logout" class="btn-logout">Logout</a>
      </div>
    </aside>

    <main class="main">
            <div class="container">
                <h2>Erstellen Sie einen Blogpost</h2>
                <form action="<?php echo URLROOT; ?>/admin/createBlogpost" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Titel:</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="body">Inhalt:</label>
                        <textarea name="body" id="body" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Bild hochladen:</label>
                        <input type="file" name="image" id="image" class="form-control" onchange="previewImage(event)">
                    </div>
                    <div class="form-group">
                        <img id="image-preview">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Erstellen" class="btn-submit">
                    </div>
                </form>
            </div>
        </main>
        <footer class="footer">
            <div class="footer__copyright">&copy; 2024 Josef Leite</div>
        </footer>
    </div>
    <script src="<?php echo URLROOT; ?>/js/blogpost-creat.js"></script>
</body>
</html>
