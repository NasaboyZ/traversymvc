<?php require APPROOT . '/views/inc/head/head.fashionandbranding.php'; ?>

<body>
<div class="grid-container">
    <div class="menu-icon">
      <i class="fas fa-bars header__menu"></i>
    </div>

    <header class="header">
      <div class="header__avatar">Welcome <?php echo htmlspecialchars($data['username']); ?>!</div>
    </header>

    <aside class="sidenav">
            <h2 class="title__sidenav"><a class="dashboard-link" href="<?php echo URLROOT; ?>/admin/dashboard">Mue Wear Collectiv</a></h2>
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
      <h2 class="sub">Willkommen auf der Fashion und Branding Page</h2>
      <p class="fliesstext">Hier kannst du neustes aus der Fashion und Branding Welt zu deiner Community bringen.</p>
      <div class="main-cards">
        <div class="card">
          <h3>Section and Uploader</h3>
          <?php if(!empty($data['error'])): ?>
            <div class="error-message" style="color: red;"><?php echo $data['error']; ?></div>
          <?php endif; ?>
          <form action="<?php echo URLROOT; ?>/admin/uploadFashionArtImage" method="post" enctype="multipart/form-data">
            <div class="upload-container" id="upload-container">
              <i class="fa-solid fa-cloud-arrow-up"></i>
              <p>Upload your landing page video</p>
              <input type="file" id="file-upload" name="image_file" style="display: none;">
              <img id="preview-image" class="preview_img" src="#" alt="Preview" style="display: none;">
            </div>
            <div class="form-group">
              <label for="image-title">Titel des Images</label>
              <input type="text" id="image-title" name="image_title" class="form-control" placeholder="Bitte fügen Sie hier Ihren Titel ein." >
            </div>
            <div class="form-group">
              <label for="section-text">Text</label>
              <textarea id="section-text" name="image_description" class="textarea-control" rows="4" placeholder="Bitte fügen Sie hier ihren Text ein" ></textarea>
            </div>
            <button type="submit" class="btn-submit">Save</button>
          </form>
        </div>
      </div>
    </main>

    <footer class="footer">
      <div class="footer__copyright">&copy; 2024 Josef Leite</div>
    </footer>
  </div>
  <script src="<?php echo URLROOT; ?>/js/fashionbranid.js"></script>
  <script src="<?php echo URLROOT; ?>/js/admin-dashboard.js"></script>
</body>
</html>
