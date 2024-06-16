<?php require APPROOT . '/views/inc/head/head.community.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<body>
    <header class="hero-fashion">
        <h1 class="title title-in-movement">Community</h1>

        <div class="grid-in-communit">
            <div class="container-for-p-and-a-tag">
                <p class="hero-massage-to-the-world text">Create your look, paint your story<br>MoiWear Collectiv will be with you.</p>
                <a href="<?php echo URLROOT; ?>/pages/kontaktFormular" class="bttn-in-hero">Join</a>
            </div>
            <div class="container-bild-in-hero">
                <img src="<?php echo URLROOT; ?>/assets/bilder/cyberpank.png" srcset="<?php echo URLROOT; ?>/assets/bilder/cyberpank.webp" alt="schöne AI Grafik einer Jungen Dame die sich cool vor der Camera gibt und ein Violletter background sie begleitet.">
            </div>
        </div>
    </header>

    <section class="news-horenzotial-letter">
        <div class="container-for-news-latter">
            <p class="move-newsletter">
                <?php if(!empty($data['events'])): ?>
                    <?php foreach($data['events'] as $event): ?>
                        Next Event: <?php echo htmlspecialchars($event->title); ?> on <?php echo htmlspecialchars($event->date); ?>. 
                        Description: <?php echo htmlspecialchars($event->description); ?> | 
                    <?php endforeach; ?>
                <?php else: ?>
                    No upcoming events.
                <?php endif; ?>
            </p>
        </div>
    </section>

    <section class="container-dreamer">
        <h2 class="sub dreamer-title">Vom Traum zur Realität</h2>
        <div class="blog-post-one">
            <div class="bild-dreamer">
                <img src="<?php echo URLROOT; ?>/assets/bilder/green-eyes-blue-skeys.jpeg" srcset="<?php echo URLROOT; ?>/assets/bilder/green-eyes-blue-skeys.webp" alt="plackt mit blauen augen und grossen brauenen harren eine frau wahrscheinlich ist man nicht sicher gehen wir von nonbinäre geschlecht aus.">
            </div>
            <div class="flies-text-dreamer">
                <h3 class="sub mwc-title-in-comunity">M.W.C</h3>
                <p class="text slim-chaidy">In einer kleinen Stadt, in der sich die Hoffnungen und Träume der Bewohner wie unsichtbare Fäden durch die Luft webten, entstand eine Gemeinschaft, die den Begriff "Hope" neu definierte. Es begann alles mit einer Idee, einem Funken, der die Herzen einiger kreativer Köpfe entzündete und eine Bewegung in Gang setzte. und das hat sich endwickelt denn heute Schreiben wir den Begriff ganz neu "Community".</p>
            </div>
        </div>
        <div class="subtitle-for-count-up">
            <h2 class="sub">We reached </h2>
        </div>
    </section>

    <section class="counter-container-section">
        <div class="counter-up-automatic">
            <span class="material-symbols-outlined count-up-emoji">
                rocket_launch
            </span>
            <div class="counter-number" id="num-2">0+</div>
            <div class="counter-title"> <strong>Users</strong> </div>
        </div>
        <div class="counter-up-automatic">
            <span class="material-symbols-outlined count-up-emoji">
                location_city
            </span>
            <div class="counter-number" id="num-3">0+</div>
            <div class="counter-title"> <strong>Location</strong> </div>
        </div>
        <div class="counter-up-automatic">
            <span class="material-symbols-outlined count-up-emoji">
                public
            </span>
            <div class="counter-number" id="num-4">0+</div>
            <div class="counter-title"> <strong>country</strong> </div>
        </div>
    </section>

    <section class="container-dreamer">
        <h2 class="sub dreamer-title">Communty Looks</h2>
        <div class="mwc-looks-conntainer">
            <div class="bild-von-tamina">
                <img src="<?php echo URLROOT; ?>/assets/bilder/tanina-meroli.jpeg" srcset="<?php echo URLROOT; ?>/assets/bilder/tanina-meroli.webp" alt="jung talentiert tanina blond jung und gut aussehend">
            </div>
            <div class="flies-text-dreamer">
                <h3 class="sub mwc-title-in-comunity">M.W.C</h3>
                <p class="text slim-chaidy">In der schillernden Modewelt, die von Trends und kreativen Köpfen geprägt ist, erhebt sich eine junge Designerin aus Griechenland zu neuen Höhen: Tamina Marial. Mit ihrem innovativen Ansatz und einer beeindruckenden Leidenschaft für Design hat sie sich einen festen Platz in der internationalen Fashion-Szene erobert. Die 30-jährige Tamina Marial, mit Wurzeln in Thessaloniki, ist die Schöpferin hinter dem aufstrebenden Modelabel "Marial Couture".<br><br>Ihre Designs sind eine Fusion aus traditioneller griechischer Eleganz und zeitgenössischer Raffinesse. Inspiriert von der Schönheit der Ägäis und der Lebendigkeit der griechischen Inseln, bringt Tamina eine frische Brise in die Modewelt.</p>
            </div>
        </div>
        <div class="contianer-for-button-in-mwc">
            <a class="btn-looks " href="<?php echo URLROOT; ?>/pages/index">Weiter lesen</a>
        </div>
    </section>

    <!-- art in zurich -->
    <section class="art-in-zurich-container">
        <h2 class="sub subtitle-art">Art in Zürich</h2>
        <div class="container-bild-text-boxen">
            <div class="bild-art-zurich">
                <img src="<?php echo URLROOT; ?>/assets/bilder/mario-anzunaki.jpeg" srcset="<?php echo URLROOT; ?>/assets/bilder/mario-anzunaki.webp" alt="Ein Bild über einen Jungen man der sich Mario nennt der Künstler ist schwarze haare, orange shirt.">
            </div>
            <div class="fliess-text-art-in-zurich">
                <h2 class="sub mario-title">Mario Azunaki</h2>
                <p class="text text-in-zurich">Zürich, eine Stadt bekannt für ihre kulturelle Vielfalt und künstlerische Kreativität, hat einen aufstrebenden Künstler, der die lokale Kunstszene mit seinem einzigartigen Stil und seiner expressiven Vision bereichert. Mario Azunaki, gebürtig aus Zürich, ist mehr als nur ein Künstler – er ist ein Schöpfer von Emotionen und Geschichten durch seine Werke.</p>
            </div>
        </div>
    </section>

    <section class="api">
        <h2 class="sub blog-post-ort-title">Blog Post</h2>
    </section>

    <?php require APPROOT . '/views/inc/footer.php'; ?>
</body>
</html>
