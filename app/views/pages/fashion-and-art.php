<?php require APPROOT . '/views/inc/head/head.fashionArt.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<body>

    <header class="hero-fashion">
        <h1 class="title title-in-movement">Fashion & Art</h1>

        <div class="page-fashion-grid">
            <div class="div-for-p-and-a-herp-fashion">
                <p class="hero-massage-to-the-world text">Create your look, paint your story<br>MoiWear Collectiv will
                    be with you.</p>
                <a href="<?php echo URLROOT; ?>/kontakt-formular.html" class="bttn-in-hero">Join</a>
            </div>
            <div class="container-for-video-fashion">
                <video src="<?php echo URLROOT; ?>/assets/videos/shuh-rotation.mp4" loop autoplay muted></video>
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

    <h2 class="sub title-für-die-erste-section">AI Gen</h2>
    <!-- Neuer Abschnitt für hochgeladene Bilder -->
    <section class="uploaded-fashion-art">
        <div class="container-for-uploaded-fashion-art">
            <?php foreach ($data['fashionArtImages'] as $image): ?>
                <div class="uploaded-fashion-art-item">
                    <h4><?php echo htmlspecialchars($image->title); ?></h4>
                    <p><?php echo htmlspecialchars($image->description); ?></p>
                    <img src="<?php echo URLROOT . '/uploads/' . htmlspecialchars(basename($image->file_path)); ?>" alt="<?php echo htmlspecialchars($image->title); ?>" style="max-width: 100%;">
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="diashow">
        <h2 class="sub titel-in-diashow">ART</h2>
        <div class="container-for-art">
            <div class="container-nur-imges">
                <img src="<?php echo URLROOT; ?>/assets/bilder/plackat-art.webp" alt="plackat-art">
            </div>
            <div class="container-arcodion">
                <div class="arccodion" id=".box-c">
                    <div class="contentBx">
                        <div class="label">Ideas</div>
                        <div class="content">
                            <p class="text fliestext-arcodion">
                                Ideen sind kreative Bausteine, die Innovation und Fortschritt antreiben, als leuchtende
                                Impulse für neue Entdeckungen und bedeutungsvolle Schöpfungen.</p>
                        </div>
                    </div>
                    <div class="contentBx">
                        <div class="label">Creativity</div>
                        <div class="content">
                            <p class="text">Kreativität ist der Schlüssel zu unendlichen Möglichkeiten und
                                Ausdrucksformen, ein Quellpunkt, der in der Fähigkeit liegt, Gedanken in einzigartige
                                Konzepte zu formen und dabei konventionelle Grenzen zu durchbrechen.</p>
                        </div>
                    </div>
                    <div class="contentBx">
                        <div class="label">Minimalistic</div>
                        <div class="content">
                            <p class="text">
                                Minimalistische Kunst zeichnet sich durch ihre Reduktion auf das Wesentliche aus, wo
                                leere Räume, klare Linien und einfache Formen subtile Eleganz und Tiefe erzeugen.</p>
                        </div>
                    </div>
                    <div class="contentBx">
                        <div class="label">Studio</div>
                        <div class="content">
                            <p class="text">In einem kreativen Kunststudio entstehen faszinierende Werke, wenn
                                talentierte Künstler ihre inspirierten Ideen in beeindruckende Kunstwerke umsetzen.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="juliano-mercedes">
        <h2 class="sub title-für-die-zweite-section">Fashion & Branding</h2>
        <div class="container-for-grid">
            <div class="container-for-text">
                <h2 class="sub">Juliano Mercedes</h2>
                <p class="fliestext-in-container-fashion">Juliano Mercedes, ein Name, der in der Welt der Mode und des Brandings glänzt, hat sich zu einem wegweisenden Designer entwickelt, der seine Leidenschaft für Kunst und Fashion auf einzigartige Weise vereint. Sein Schaffen ist nicht nur von ästhetischer Brillanz geprägt, sondern auch ein Ausdruck seiner individuellen Reise durch die Welt der Kreativität. Seine neue Kreationen stellt Designer Weltweit auf dem Kopf.</p>
                <a href="<?php echo URLROOT; ?>/pages/kontaktFormular" class="btn btn-in-banner">Join</a>
            </div>
            <div class="img-container-for-juliano">
                <img src="<?php echo URLROOT; ?>/assets/bilder/juliano-mercedes.jpg" srcset="<?php echo URLROOT; ?>/assets/bilder/juliano-mercedes.webp" alt="Teller mit Salat und gemüsse mischenung für vegetarier">
            </div>
        </div>
        <div class="container-horizontale-gallerie">
            <div class="container_horizontal-gallerie">
                <img src="<?php echo URLROOT; ?>/assets/bilder/lederhose-frau-macht-joga.jpeg" srcset="<?php echo URLROOT; ?>/assets/bilder/lederhose-frau-macht-joga.webp" alt="Eine schöne Junge Dame mach eine Coole Pose vor der Camera trägt dabei eine schwarze Lederhose.">
            </div>
            <div class="container_horizontal-gallerie">
                <img src="<?php echo URLROOT; ?>/assets/bilder/ich-bin-nicht-so-eine-schwestern.jpg" srcset="<?php echo URLROOT; ?>/assets/bilder/ich-bin-nicht-so-eine-schwestern.webp" alt="Schwestern die sich die geben und im flur stehen mit rotlicht.">
            </div>
            <div class="container_horizontal-gallerie">
                <img src="<?php echo URLROOT; ?>/assets/bilder/model-vor-camera.jpeg" srcset="<?php echo URLROOT; ?>/assets/bilder/model-vor-camera.webp" alt="Schönes Model mit Rose im Bikini mach die Köpfe der Männer verrückt.">
            </div>
            <div class="container_horizontal-gallerie">
                <img class="bilder-in-horizontales-scrollen" src="<?php echo URLROOT; ?>/assets/bilder/mänliches-model-camera.jpeg" srcset="<?php echo URLROOT; ?>/assets/bilder/mänliches-model-camera.webp" alt="Mänliches Model macht die Frauen heiss mit seinen neuen Hemnd das eine Marinen farbe hat.">
            </div>
            <div class="container_horizontal-gallerie">
                <img src="<?php echo URLROOT; ?>/assets/bilder/frauen-zeigen-shuhe.jpg" srcset="<?php echo URLROOT; ?>/assets/bilder/frauen-zeigen-shuhe.webp" alt="Frauen zeigen Marken shuhe und stehen schön in einer reihe da.">
            </div>
        </div>
    </section>

   

    <?php require APPROOT . '/views/inc/footer.php'; ?>

</body>
</html>
