<?php require APPROOT . '/views/inc/head/head.admin-dashboard.php'; ?>

<body>
  <div class="grid-container">
    <div class="menu-icon">
      <i class="fas fa-bars header__menu"></i>
    </div>

    <header class="header">
      <div class="header__avatar">Welcome <?php echo htmlspecialchars($data['username']); ?>!</div>
      <div class="header__logout">
        <a href="<?php echo URLROOT; ?>/admin/logout" class="btn-logout">Logout</a>
      </div>
    </header>

    <aside class="sidenav">
      <h2 class="title__sidenav">Mue Wear Collectiv</h2>
      <div class="sidenav__close-icon">
        <i class="fas fa-times sidenav__brand-close"></i>
      </div>
      <ul class="sidenav__list">
        <li class="sidenav__list-item">
          <span><a href="<?php echo URLROOT; ?>/admin/newsbanner">News Banner</a></span>
        </li>
        <li class="sidenav__list-item">
          <span>Fashion & Art</span>
          <ul class="sub-menu">
            <li class="sub-menu__item">Art</li>
          </ul>
        </li>
        <li class="sidenav__list-item">
          <span>Community</span>
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
      <div class="main-cards">
        <div class="card">Overview Landing Page
          <div class="main-cards_section">
            <?php foreach ($data['events'] as $event): ?>
              <div class="main-content-cards">
                <p>
                  <strong><?php echo htmlspecialchars($event->title); ?>:</strong> 
                  <?php echo htmlspecialchars($event->description); ?> 
                  on <?php echo htmlspecialchars($event->date); ?>
                  <i class="fa-solid fa-ellipsis-vertical"></i>
                </p>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        
        <div class="card">Overview Fashion & Art
          <div class="container-main-fashion">
            <div class="container-content-main-fashi">
              <p>blablabla <i class="fa-solid fa-ellipsis-vertical"></i></p>
            </div>
          </div>
        </div>
        <div class="card">Overview Community
          <div class="main-container-for-content-community">
            <div class="main-content-community">
              <p>blablabla <i class="fa-solid fa-ellipsis-vertical"></i></p>
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer class="footer">
      <div class="footer__copyright">&copy; 2024 Josef Leite</div>
    </footer>
  </div>
  <script>
    document.querySelectorAll('.sidenav__list-item > span').forEach(item => {
      item.addEventListener('click', () => {
        const subMenu = item.nextElementSibling;
        subMenu.classList.toggle('active');
      });
    });
  </script>
</body>
</html>
