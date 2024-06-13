<?php require APPROOT . '/views/inc/head/head.kontaktFormular.php'; ?>
<?php require APPROOT . '/views/inc/navbar.kontaktFormular.php'; ?>

<body>
    <main> 
        <div class="container-form">
            <form class="form-kontakt" action="<?php echo URLROOT; ?>/pages/kontaktFormular" method="POST" novalidate>
                <div class="container-anrede">
                    <input type="radio" id="male" name="anrede" value="Herr" <?php echo isset($data['anrede']) && $data['anrede'] == 'Herr' ? 'checked' : ''; ?>>
                    <label for="male">Herr</label> <br>

                    <input type="radio" id="female" name="anrede" value="Frau" <?php echo isset($data['anrede']) && $data['anrede'] == 'Frau' ? 'checked' : ''; ?>>
                    <label for="female">Frau</label> <br>
                    
                    <input type="radio" id="other" name="anrede" value="Andere" <?php echo isset($data['anrede']) && $data['anrede'] == 'Andere' ? 'checked' : ''; ?>>
                    <label for="other">Nonbinary</label>
                    <?php echo isset($data['errors']['anrede']) ? '<span class="error-message">' . $data['errors']['anrede'] . '</span>' : ''; ?>
                </div>

                <div class="container-firstname">
                    <input class="focusout" type="text" name="firstname" id="firstname" placeholder="Vorname" value="<?php echo $data['firstname']; ?>">
                    <?php echo isset($data['errors']['firstname']) ? '<span class="error-message">' . $data['errors']['firstname'] . '</span>' : ''; ?>
                </div>

                <div class="container-secondname">
                    <input class="focusout" type="text" name="secondName" id="secondName" placeholder="Nachname" value="<?php echo $data['secondName']; ?>">
                    <?php echo isset($data['errors']['secondName']) ? '<span class="error-message">' . $data['errors']['secondName'] . '</span>' : ''; ?>
                </div>

                <div class="container-nutzername">
                    <input class="focusout" type="text" name="nutzername" id="nutzername" placeholder="Nutzername" value="<?php echo $data['nutzername']; ?>">
                    <?php echo isset($data['errors']['nutzername']) ? '<span class="error-message">' . $data['errors']['nutzername'] . '</span>' : ''; ?>
                </div>

                <div class="container-email">
                    <input class="focusout" type="email" name="email" id="email" placeholder="Email" value="<?php echo $data['email']; ?>">
                    <?php echo isset($data['errors']['email']) ? '<span class="error-message">' . $data['errors']['email'] . '</span>' : ''; ?>
                </div>

                <div class="container-password">
                    <input class="focusout" type="password" name="password" id="password" placeholder="Password">
                    <?php echo isset($data['errors']['password']) ? '<span class="error-message">' . $data['errors']['password'] . '</span>' : ''; ?>
                </div>

                <div class="container-password-repeat">
                    <input class="focusout" type="password" name="password_repeat" id="password_repeat" placeholder="Password wiederholen">
                    <?php echo isset($data['errors']['password_repeat']) ? '<span class="error-message">' . $data['errors']['password_repeat'] . '</span>' : ''; ?>
                </div>

                <div class="container-agb">
                    <label>
                        <input type="checkbox" id="agb" name="agb" value="accepted" <?php echo isset($data['agb']) ? 'checked' : ''; ?>> Ich akzeptiere die <a href="/agb.html">AGB</a>
                        <span class="checkmark"></span>  
                    </label>
                    <?php echo isset($data['errors']['agb']) ? '<span class="error-message">' . $data['errors']['agb'] . '</span>' : ''; ?>
                </div>

                <div class="container-submit">
                    <input class="focusout" id="submit" type="submit" value="Abschicken!">
                </div>
            </form>
        </div>
    </main>

   
</body>
</html>
