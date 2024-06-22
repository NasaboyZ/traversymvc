<?php require APPROOT . '/views/inc/head/head.newbanner.php'; ?>
<body>
    <div class="grid-container">
        <div class="menu-icon">
            <i class="fas fa-bars header__menu"></i>
        </div>

        <header class="header">
            <div class="header__avatar">
                <a href="<?php echo URLROOT; ?>/admin/dashboard">Welcome <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</a>
            </div>
        </header>

        <aside class="sidenav">
            <h2 class="title__sidenav">
                <a class="dashboard-link" href="<?php echo URLROOT; ?>/admin/dashboard">Mue Wear Collectiv</a>
            </h2>
            <div class="sidenav__close-icon">
                <i class="fas fa-times sidenav__brand-close"></i>
            </div>
            <ul class="sidenav__list">
                <li class="sidenav__list-item">
                    <span onclick="toggleSubMenu(this)">Landing Page</span>
                    <ul class="sub-menu">
                        <li class="sub-menu__item">
                            <a href="<?php echo URLROOT; ?>/admin/newsbanner">News Banner</a>
                        </li>
                    </ul>
                </li>
                <li class="sidenav__list-item">
                    <span onclick="toggleSubMenu(this)">Fashion & Art</span>
                    <ul class="sub-menu">
                        <li class="sub-menu__item">
                            <a href="<?php echo URLROOT; ?>/admin/fashionandbranding">AI Gen</a>
                        </li>
                    </ul>
                </li>
                <li class="sidenav__list-item">
                    <span onclick="toggleSubMenu(this)">Community</span>
                    <ul class="sub-menu">
                        <li class="sub-menu__item">
                            <a href="<?php echo URLROOT; ?>/admin/createBlogpost">Blog Post erstellen</a>
                        </li>
                    </ul>
                </li>
                <li class="sidenav__list-item">
                    <span onclick="toggleSubMenu(this)">Register Admin</span>
                    <ul class="sub-menu">
                        <li class="sub-menu__item">
                            <a href="<?php echo URLROOT; ?>/admin/registerAdmin">Register</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="sidenav__logout">
                <a href="<?php echo URLROOT; ?>/admin/logout" class="btn-logout">Logout</a>
            </div>
        </aside>


    <main class="main">

    <h2 class="sub">Willkomen auf der Newsbanner page</h2>
    <p class="fliesstext">Hier können sie Events erstellen wo auf den Eventsbanner Angezeigt werden um das neuste vom neusten zu wissen.</p>
      <div class="main-cards">
        <div id="event-forms-container">
          <div class="card">
            <form action="<?php echo URLROOT; ?>/admin/newevent" method="post" class="event-form">
              <div id="event-fields-0" class="event-fields">
                <div class="event-field">
                  <div class="form-group">
                    <label for="event-title-0">Event Titel:</label>
                    <input type="text" id="event-title-0" name="event_title[]" class="form-control" placeholder="Titel eingeben" required>
                  </div>
                  <div class="form-group">
                    <label for="event-description-0">Event Beschreibung:</label>
                    <textarea id="event-description-0" name="event_description[]" class="form-control" placeholder="Beschreibung eingeben" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="event-date-0">Event Datum:</label>
                    <input type="date" id="event-date-0" name="event_date[]" class="form-control" required>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn-submit">Speichern</button>
            </form>
          </div>
        </div>
      </div>
    </main>

    <footer class="footer">
      <div class="footer__buttons">
        <button type="button" id="add-event-form" class="btn-submit">+ Event hinzufügen</button>
        <button type="button" id="save-events" class="btn-submit">Speichern</button>
      </div>
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

    let formCount = 1;

    document.getElementById('add-event-form').addEventListener('click', function() {
      const container = document.getElementById('event-forms-container');
      const newForm = document.createElement('div');
      newForm.classList.add('card');
      newForm.innerHTML = `
        <form action="<?php echo URLROOT; ?>/admin/newevent" method="post" class="event-form">
          <div id="event-fields-${formCount}" class="event-fields">
            <div class="event-field">
              <div class="form-group">
                <label for="event-title-${formCount}">Event Titel:</label>
                <input type="text" id="event-title-${formCount}" name="event_title[]" class="form-control" placeholder="Titel eingeben" required>
              </div>
              <div class="form-group">
                <label for="event-description-${formCount}">Event Beschreibung:</label>
                <textarea id="event-description-${formCount}" name="event_description[]" class="form-control" placeholder="Beschreibung eingeben" required></textarea>
              </div>
              <div class="form-group">
                <label for="event-date-${formCount}">Event Datum:</label>
                <input type="date" id="event-date-${formCount}" name="event_date[]" class="form-control" required>
              </div>
            </div>
          </div>
        </form>
      `;
      container.appendChild(newForm);
      formCount++;
    });

    document.getElementById('save-events').addEventListener('click', function() {
      document.querySelectorAll('.event-form').forEach(form => form.submit());
    });
  </script>
</body>
</html>
