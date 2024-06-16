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
            <li class="sub-menu__item">Video</li>
          </ul>
        </li>
        <li class="sidenav__list-item">
          <span onclick="toggleSubMenu(this)">Fashion & Art</span>
          <ul class="sub-menu">
            <li class="sub-menu__item">Art</li>
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
                  <button onclick="editEvent(<?php echo $event->id; ?>)">Edit</button>
                  <button onclick="confirmDelete(<?php echo $event->id; ?>)">Delete</button>
                </div>
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
    function toggleSubMenu(element) {
      var subMenu = element.nextElementSibling;
      subMenu.classList.toggle('active');
    }

    function showOptions(eventId) {
      var menu = document.getElementById('options-' + eventId);
      menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
    }

    function editEvent(eventId) {
      // Redirect to the edit page with the event ID
      window.location.href = '<?php echo URLROOT; ?>/admin/editEvent/' + eventId;
    }

    function confirmDelete(eventId) {
      if (confirm('Are you sure you want to delete this event?')) {
        // Submit a form to delete the event
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '<?php echo URLROOT; ?>/admin/deleteEvent/' + eventId;
        document.body.appendChild(form);
        form.submit();
      }
    }
  </script>
</body>
</html>
