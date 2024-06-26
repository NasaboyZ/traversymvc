<?php require APPROOT . '/views/inc/head/head.login.php'; ?>
<?php require_once APPROOT . '/helpers/csrf_helper.php'; ?>
<body>
    <nav>
        <div class="logo-in-login"><a href="<?php echo URLROOT; ?>/index">M.W.C</a></div>
        
    </nav>
    <div class="container-login">
        <form action="<?php echo URLROOT; ?>/admin/login" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
            <div class="user-name">
                <label for="username"></label>
                <input type="text" name="username" id="username" placeholder="Enter your Username" value="<?php echo isset($data['username']) ? $data['username'] : ''; ?>">
                <span class="invalid-feedback"><?php echo isset($data['username_err']) ? $data['username_err'] : ''; ?></span>
            </div>

            <div class="passwort">
                <label for="password"></label>
                <input type="password" name="password" id="password" placeholder="Enter your Password" value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>">
                <span class="invalid-feedback"><?php echo isset($data['password_err']) ? $data['password_err'] : ''; ?></span>
            </div>

            <div class="container-submit">
                <input class="focusout" id="submit" type="submit" value="Login" />
            </div>
        </form>
    </div>
</body>
</html>
