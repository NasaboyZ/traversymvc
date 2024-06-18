<?php require APPROOT . '/views/inc/head/head.kontakt.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<body>

    <div class="container-form">
        <form class="form-kontakt">
            <select class="anrede" name="#" id="">
                <option value="# my-4">Anrede</option>
                <option value="#">Er</option>
                <option value="#">Sie</option>
            </select>
            <div class="container-firstname">
                <label for="firstname"></label>
                <input class="focusout" type="text" name="firstname" id="firstname" placeholder="Vorname" required />
            </div>
            <div class="container-secondname">
                <label for="secondName"></label>
                <input class="focusout" type="text" name="secondName" id="secondName" placeholder="Nachname" required />
            </div>
            <div class="container-adresse">
                <label for="adresse"></label>
                <input class="focusout" type="text" name="adresse" id="adresse" placeholder="Adresse" required />
            </div>
            <div class="container-plz">
                <label for="plz"></label>
                <input class="focusout" type="text" name="plz" id="plz" placeholder="Postleitzahl" required />
            </div>
            <div class="container-ort">
                <label for="ort"></label>
                <input class="focusout" type="text" name="ort" id="ort" placeholder="Ort" required />
            </div>
            <div class="continer-email">
                <label for="email"></label>
                <input class="focusout" type="email" name="email" id="email" placeholder="Email" required />
            </div>
            <div class="container-messsage">
                <label for="message"></label>
                <textarea name="message" id="message" placeholder="Nachricht"></textarea>
            </div>
            <div class="container-submit">
                <input class="focusout" id="submit" type="submit" value="Subscribe!" />
            </div>
        </form>
    </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>

</body>

</html>