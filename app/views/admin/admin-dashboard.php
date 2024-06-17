<?php require APPROOT . '/views/inc/head/head.admin-dashboard.php'; ?>

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
            <li class="sub-menu__item">News Ticker</li>
            <li class="sub-menu__item">Blog Post erstellen</li>
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
        <div class="card">Overview Landing Page
          <div class="main-cards_section">
          <?php foreach ($data['events'] as $event): ?>
    <div class="main-content-cards">
        <p>
            <strong><?php echo htmlspecialchars($event->title); ?>:</strong> 
            <?php echo htmlspecialchars($event->description); ?> 
            on <?php echo htmlspecialchars($event->date); ?>
            <i class="fa-solid fa-ellipsis-vertical" onclick="showOptions(<?php echo $event->id; ?>)"></i>
        </p>
        <div id="options-<?php echo $event->id; ?>" class="options-menu" style="display:none;">
            <a href="<?php echo URLROOT; ?>/admin/editEvent/<?php echo $event->id; ?>">Edit</a>
            <form action="<?php echo URLROOT; ?>/admin/deleteEvent/<?php echo $event->id; ?>" method="post">
                <button type="submit">Delete</button>
            </form>
        </div>
    </div>
<?php endforeach; ?>


          </div>
        </div>
        <div class="card">Overview Fashion & Art
  <div class="main-cards_section">
        <?php foreach ($data['fashionArtImages'] as $image): ?>
    <div class="main-content-cards">
        <div class="content-grid">
          <div class="title-container">
        <h4><?php echo htmlspecialchars($image->title); ?></h4>
          </div>
          <div class="text-container">
        <p><?php echo htmlspecialchars($image->description); ?></p>
          </div>
          <div class="image-container">
        <img src="<?php echo URLROOT . '/uploads/' . htmlspecialchars(basename($image->file_path)); ?>" alt="<?php echo htmlspecialchars($image->title); ?>" class="fashion-art-img">
          </div>
        </div>
        <i class="fa-solid fa-ellipsis-vertical" onclick="showOptions(<?php echo $image->id; ?>)"></i>
        <div id="options-<?php echo $image->id; ?>" class="options-menu-img" style="display:none;">
            <button onclick="editEvent(<?php echo $image->id; ?>)">Edit</button>
            <form action="<?php echo URLROOT; ?>/admin/deleteFashionArtImage/<?php echo $image->id; ?>" method="post">
                <button type="submit">Delete</button>
            </form>
        </div>
    </div>
<?php endforeach; ?>
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
  <script src="<?php echo URLROOT; ?>/js/admin-dashboard.js"></script>
</body>
</html>
