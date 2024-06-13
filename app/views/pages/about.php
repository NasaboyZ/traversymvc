<?php require APPROOT . '/views/inc/head/head.about.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<body>
    <header class="background-video">
        <video class="video-bar" muted autoplay loop src="<?php echo URLROOT; ?>/assets/videos/tag-traum-alle-high.mp4"></video>

        <div class="container-for-text-in-video">
            <h2 class="sub main-titel-in-video">About</h2>
            <h3 class="sub-titel-in-video">ÜBER DAS UNTERNEHMEN</h3>
            <p class="text-in-header">Wir sind ein Kollektiv, das sich um seine Belange kümmert und sich nicht
                ausschliesslich um die
                Erledigung seiner Aufgaben kümmert.Denn gemeinsam bauen wir mehr als nur ein Unternehmen auf. Wir
                möchten, dass MoiWear Collectiv ein Anziehungspunkt für Talente und die Verkörperung großartiger Ideen
                ist.

                Deshalb gibt es hier Freiheit, Kreativität, Inspiration und Sinn, die jeden von uns entwickeln.</p>
        </div>
    </header>

    <section class="news-horenzotial-letter">
        <div class="container-for-news-latter">
            <p class="move-newsletter">Next M.W.C Event: 09 / 28 / 24 Sign up! | Next Sustainability Event: 06 / 08 /
                2 Sign up! </p>
        </div>
    </section>

    <section class="section-main-reverse ">
        <div class="img-container">
            <img class="img aufnahme-in-container" src="<?php echo URLROOT; ?>/assets/bilder/event-plackat.jpg"
                srcset="<?php echo URLROOT; ?>/assets/bilder/event-plackat.webp"
                alt="Ein Künstlirisches zusamen spiel von menschen puppen, blummen,historische Persönlichkeiten auf ein bages hintergrund bild.">
        </div>

        <div class="section">
            <h2 class="sub der-titel-von-section-reverse">M.W.C</h2>
            <p class="fliestext-in-container-about">Wir sind dafür bekannt, lokal präsent zu sein, wenn sowohl grosse
                als auch kleine Marken ihre Events feiern, einschließlich unserer eigenen Veranstaltungen. Dabei setzen
                wir Trends in der aktuellen Zeit ein und präsentieren jungen Menschen die neuesten Kollektionen.</p>
        </div>
    </section>

    <section class="section-main-noraml">
        <div class="section">
            <h2 class="sub">Nachhaltig</h2>
            <p class="fliestext-in-container-about">Nachhaltigkeit ist ein weiterer zentraler Aspekt unseres
                Engagements. Wir setzen uns dafür ein, dass unsere Kleidung unter fairen Arbeitsbedingungen hergestellt
                wird und verwenden umweltfreundliche Materialien, um einen positiven Beitrag zur Gesellschaft und zur
                Umwelt zu leisten.</p>
        </div>
        <div class="img-container">
            <img class="img aufnahme-in-container" src="<?php echo URLROOT; ?>/assets/bilder/hippy-streckt-schild-auf.jpg"
                srcset="<?php echo URLROOT; ?>/assets/bilder/hippy-streckt-schild-auf.webp"
                alt="hippy streckt schild auf Sie wollen mehr Erde mehr Bio und kein Kapitalismus.">
        </div>
    </section>

    <section class="kleiner-spruch-in-der-main">
        <h2 class="sub sub-in-section-about">Willst du dabei sein?!</h2>
        <p class="fliestext-in-container-about">Bist du bereit, Teil einer pulsierenden Community zu werden, die Mode
            als Ausdruck der Lebensfreude feiert? Dann schließe dich uns an und erlebe Fashion, wo Stil und gute Laune
            Hand in Hand gehen. Verpasse nicht die Gelegenheit, in einer Welt voller Kreativität und Modebegeisterung
            aufzugehen! Besuche Unsere Event Days.</p>
    </section>

    <div class="container-for-carousel">
        <div class="carousel">
            <div class="slider">
                <div class="slider-wrapper">
                    <section class="slide">
                        <img src="<?php echo URLROOT; ?>/assets/bilder/rinaldina-paarfusse.jpg"
                            srcset="<?php echo URLROOT; ?>/assets/bilder/rinaldina-paarfusse.webp"
                            alt="rinaldina-paarfusse sie steht da mt einen lächen wie gebacken und hat ein Graues top an.">
                    </section>
                    <section class="slide">
                        <img src="<?php echo URLROOT; ?>/assets/bilder/frau-lacht-alleine.jpg" srcset="<?php echo URLROOT; ?>/assets/bilder/frau-lacht-alleine.webp"
                            alt="eine dame in der küche schaut sich Netflix an und lacht.">
                    </section>
                    <section class="slide">
                        <img src="<?php echo URLROOT; ?>/assets/bilder/frau-sitzt-mit-laptop.jpeg"
                            srcset="<?php echo URLROOT; ?>/assets/bilder/frau-sitzt-mit-laptop.webp"
                            alt="eine frau mit blauer mütze sitz auf der coutch und man hat ein bild geschossen aus der Seite.">
                    </section>
                    <section class="slide">
                        <img src="<?php echo URLROOT; ?>/assets/bilder/gina-marina.jpg" srcset="<?php echo URLROOT; ?>/assets/bilder/gina-marina.webp"
                            alt="gina-marina ist die chefin einesoffice und lacht mit ihren schönnen orangen t-shirt.">
                    </section>
                </div>

                <div class="controls">
                    <span id="prevBtn" class="material-symbols-outlined arrow left">
                        arrow_back
                    </span>
                    <span id="nextBtn" class="material-symbols-outlined arrow right">
                        arrow_forward
                    </span>
                </div>
            </div>

            <div class="pause-and-play-btn">
                <span class="material-symbols-outlined play_arrow">
                    play_arrow
                </span>
                <span class="material-symbols-outlined pause-button">
                    pause
                </span>
            </div>
        </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
</body>
</html>
