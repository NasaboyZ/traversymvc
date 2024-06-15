<?php require APPROOT . '/views/inc/head/head.kontaktFormular.php'; ?>
<?php require APPROOT . '/views/inc/navbar.kontaktFormular.php'; ?>

<body>


    <main>
        <div class="container-form">
            <form class="form-kontakt" action="<?php echo URLROOT; ?>/login" method="POST" novalidate>
                <div class="container-anrede">
                    <input type="radio" id="male" name="anrede" value="Herr">
                    <label for="male">Herr</label> <br>

                    <input type="radio" id="female" name="anrede" value="Frau">
                    <label for="female">Frau</label> <br>

                    <input type="radio" id="other" name="anrede" value="Andere">
                    <label for="other">Nonbinary</label>
                </div>

                <div class="container-firstname">
                    <input class="focusout" type="text" name="firstname" id="firstname" placeholder="Vorname">
                </div>

                <div class="container-secondname">
                    <input class="focusout" type="text" name="secondName" id="secondName" placeholder="Nachname">
                </div>

                <div class="container-nutzername">
                    <input class="focusout" type="text" name="nutzername" id="nutzername" placeholder="Nutzername">
                </div>

                <div class="container-email">
                    <input class="focusout" type="email" name="email" id="email" placeholder="Email">
                </div>

                <div class="container-password">
                    <input class="focusout" type="password" name="password" id="password" placeholder="Password">
                </div>

                <div class="container-password-repeat">
                    <input class="focusout" type="password" name="password_repeat" id="password_repeat" placeholder="Password wiederholen">
                </div>

                <div class="container-agb">
                    <label>
                        <input type="checkbox" id="agb" name="agb" value="accepted"> Ich akzeptiere die <a href="/agb.html">AGB</a>
                        <span class="checkmark"></span>
                    </label>
                </div>

   

                <div class="container-submit">
                    <input class="focusout" id="submit" type="submit" value="Abschicken!">
                </div>
            </form>
        </div>
    </main>


</body>
</html>

