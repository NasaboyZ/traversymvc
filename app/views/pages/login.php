<?php require APPROOT . '/views/inc/head/head.login.php'; ?>
<body>
    <nav>
        <div class="logo-in-login"><a href="<?php echo URLROOT; ?>/index">M.W.C</a></div>
        <div class="container-for-interaction">
            <p class="frage-an-user">Create an account with us?</p>
            <a href="<?php echo URLROOT; ?>/pages/kontaktFormular" class="btn-login">Sign up</a>
        </div>
    </nav>
    <div class="container-login">
        <form action="<?php echo URLROOT; ?>/admin/login" method="POST">
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
