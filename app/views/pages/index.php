<?php require APPROOT . '/views/inc/head/head.index.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<body>
    <header class="hero-page">
        <div class="background">
            <h1 class="title title-in-movement">MoiWear Collectiv</h1>
            <p class="hero-massage-to-the-world text">Create your look, paint your story<br>MoiWear Collectiv will be
                with
                you.</p>
            <a href="kontakt-formular.html" class="bttn-in-hero">Join</a>
        </div>

        <div class="container-for-pic-header">
            <img src="assets/bilder/index-option-zwei.png" srcset="assets/bilder/index-option-zwei.webp" alt="Bild"
                class="centered-image">
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

    <section class="branding-section">
        <div class="content-only-img">
            <img class="bild-section" src="assets/bilder/art.jpg" alt="Bilder von Figuren mit Muster Kleidung.">
        </div>
        <h2 class="sub in-branding">Branding + Interactive Creative Partner.</h2> <br>
        <i class="italic-branding">" Exchange ideas with the community!
            Learn, grow and improve."</i>

        <div class="container-for-tow-imges">
            <img class="bilder-one" src="assets/bilder/yellow-jacket.jpg" srcset="assets/bilder/yellow-jacket.webp"
                alt="Eine Frau mit Braunen Haaren steht in der Wüsste und hat einen Gelben Joggin anzug an.">
            <img class="bilder-two" src="assets/bilder/black-jacket.jpg" srcset="assets/bilder/black-jacket.webp"
                alt=" Eine Frau mit Blonden Haaren steht in einem Sportfeld und mach eine Offene Pose für die Kamera und hat eine eine Schwarz weise joggin hose.">
        </div>
    </section>

    <section class="events-and-recources-container-in-index">
        <div class="container-sub-event">
            <h2 class="sub">Events,Resource <br>Tutorials.</h2>
        </div>
        <div class="video-container">
            <video src="assets/videos/fashion-show (video-converter.com).mp4" autoplay loop muted></video>
        </div>
        <div class="quote-for-events">
            <p class="text paragraph-in-quote-container">discover the world of new trends!</p>
            <img class="arrow-right" src="assets/bilder/svg/Pfeil.svg"
                alt="Pfeil nach oben der dich ganz schnell wieder zum start führt">
            <a href="kontakt-formular.html" class="btn btn-video-container ">Join</a>
        </div>
    </section>
<?php require APPROOT . '/views/inc/footer.php'; ?>
</body>
</html>
