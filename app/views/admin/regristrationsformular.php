<?php require APPROOT . '/views/inc/head/head.regristrationsformular.php'; ?>

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
            <li class="sub-menu__item"><a href="<?php echo URLROOT; ?>/admin/registerAdmin">Regristieren</a></li>
          </ul>
        </li>
      </ul>
      <div class="sidenav__logout">
        <a href="<?php echo URLROOT; ?>/admin/logout" class="btn-logout">Logout</a>
      </div>
    </aside>

    <main class="main">
      <div class="main-cards-register">
        <div class="card-register">
          <h2>Admin Registration</h2>
          <form class="register-form" action="<?php echo URLROOT; ?>/admin/registerAdmin" method="POST">
            <div class="form-group-register">
                <label for="anrede">Anrede: <sup>*</sup></label>
                <select name="anrede" class="form-control">
                    <option value="Herr" <?php echo isset($data['anrede']) && $data['anrede'] == 'Herr' ? 'selected' : ''; ?>>Herr</option>
                    <option value="Frau" <?php echo isset($data['anrede']) && $data['anrede'] == 'Frau' ? 'selected' : ''; ?>>Frau</option>
                </select>
                <span class="invalid-feedback"><?php echo isset($data['errors']['anrede']) ? $data['errors']['anrede'] : ''; ?></span>
            </div>
            <div class="form-group-register">
                <label for="firstname">Vorname: <sup>*</sup></label>
                <input type="text" name="firstname" class="form-control" value="<?php echo isset($data['firstname']) ? $data['firstname'] : ''; ?>">
                <span class="invalid-feedback"><?php echo isset($data['errors']['firstname']) ? $data['errors']['firstname'] : ''; ?></span>
            </div>
            <div class="form-group-register">
                <label for="secondName">Nachname: <sup>*</sup></label>
                <input type="text" name="secondName" class="form-control" value="<?php echo isset($data['secondName']) ? $data['secondName'] : ''; ?>">
                <span class="invalid-feedback"><?php echo isset($data['errors']['secondName']) ? $data['errors']['secondName'] : ''; ?></span>
            </div>
            <div class="form-group-register">
                <label for="nutzername">Benutzername: <sup>*</sup></label>
                <input type="text" name="nutzername" class="form-control" value="<?php echo isset($data['nutzername']) ? $data['nutzername'] : ''; ?>">
                <span class="invalid-feedback"><?php echo isset($data['errors']['nutzername']) ? $data['errors']['nutzername'] : ''; ?></span>
            </div>
            <div class="form-group-register">
                <label for="email">E-Mail: <sup>*</sup></label>
                <input type="email" name="email" class="form-control" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
                <span class="invalid-feedback"><?php echo isset($data['errors']['email']) ? $data['errors']['email'] : ''; ?></span>
            </div>
            <div class="form-group-register">
                <label for="password">Passwort: <sup>*</sup></label>
                <input type="password" name="password" class="form-control" value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>">
                <span class="invalid-feedback"><?php echo isset($data['errors']['password']) ? $data['errors']['password'] : ''; ?></span>
            </div>
            <div class="form-group-register">
                <label for="password_repeat">Passwort wiederholen: <sup>*</sup></label>
                <input type="password" name="password_repeat" class="form-control" value="<?php echo isset($data['password_repeat']) ? $data['password_repeat'] : ''; ?>">
                <span class="invalid-feedback"><?php echo isset($data['errors']['password_repeat']) ? $data['errors']['password_repeat'] : ''; ?></span>
            </div>
            <div class="form-group-register">
                <label for="agb">AGB: <sup>*</sup></label>
                <input type="checkbox" name="agb" value="1" <?php echo isset($data['agb']) && $data['agb'] == 1 ? 'checked' : ''; ?>> Ich akzeptiere die AGB
            </div>
            <span class="invalid-feedback"><?php echo isset($data['errors']['agb']) ? $data['errors']['agb'] : ''; ?></span>
            <input type="submit" class="btn" value="Regristieren">
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
