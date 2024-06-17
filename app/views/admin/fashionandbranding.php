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
      <h2 class="title__sidenav">Mue Wear Collectiv</h2>
      <div class="sidenav__close-icon">
        <i class="fas fa-times sidenav__brand-close"></i>
      </div>
      <ul class="sidenav__list">
        <li class="sidenav__list-item">
          <span onclick="toggleSubMenu(this)">Landing Page</span>
          <ul class="sub-menu">
            <li class="sub-menu__item"><a href="<?php echo URLROOT; ?>/admin/newsbanner">News Banner</a></li>
            <li class="sub-menu__item">Video</li>
          </ul>
        </li>
        <li class="sidenav__list-item">
          <span onclick="toggleSubMenu(this)">Fashion & Art</span>
          <ul class="sub-menu">
            <li class="sub-menu__item"><a href="<?php echo URLROOT;?>/admin/fashionandbranding">Fashion & Branding</a></li>
          </ul>
        </li>
        <li class="sidenav__list-item">
          <span onclick="toggleSubMenu(this)">Community</span>
          <ul class="sub-menu">
            <li class="sub-menu__item">News Ticker</li>
          </ul>
        </li>
      </ul>
      <div class="sidenav__logout">
        <a href="<?php echo URLROOT; ?>/admin/logout" class="btn-logout">Logout</a>
      </div>
    </aside>

    <main class="main">
      <h2>Willkommen auf der Fashion und Branding Page</h2>
      <p>Hier kannst du neustes aus der Fashion und Branding Welt zu deiner Community bringen.</p>
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
              <input type="file" id="file-upload" name="image_file" style="display: none;" required>
              <img id="preview-image" class="preview_img" src="#" alt="Preview" style="display: none;">
            </div>
            <div class="form-group">
              <label for="image-title">Titel des Images</label>
              <input type="text" id="image-title" name="image_title" class="form-control" placeholder="Bitte fügen Sie hier Ihren Titel ein." required>
            </div>
            <div class="form-group">
              <label for="section-text">Text</label>
              <textarea id="section-text" name="image_description" class="textarea-control" rows="4" placeholder="Bitte fügen Sie hier ihren Text ein" required></textarea>
            </div>
            <button type="submit" class="btn-submit">Save</button>
            <button type="button" class="btn-submit">Verwerfen</button>
          </form>
        </div>
      </div>
    </main>

    <footer class="footer">
      <div class="footer__copyright">&copy; 2024 Josef Leite</div>
    </footer>
  </div>
  <script>
    document.getElementById('upload-container').addEventListener('click', function() {
      document.getElementById('file-upload').click();
    });

    document.getElementById('file-upload').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById('preview-image').src = e.target.result;
          document.getElementById('preview-image').style.display = 'block';
        };
        reader.readAsDataURL(file);
      }
    });
  </script>
  <script src="<?php echo URLROOT; ?>/js/admin-dashboard.js"></script>
</body>
</html>
