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
        <h2 class="sub dreamer-title">Community Looks</h2>
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

    <section class="api">
    <h2 class="sub blog-post-ort-title">Blog Post</h2>
    <div class="blogposts-container">
        <?php foreach ($data['blogposts'] as $post): ?>
            <div class="blogpost-card">
                <img class="blogpost-image" src="<?php echo URLROOT . '/uploads/' . htmlspecialchars(basename($post->image)); ?>" alt="<?php echo htmlspecialchars($post->title); ?>">
                <div class="blogpost-content">
                    <span class="blogpost-category">Admin Blogpost </span>
                    <h3><?php echo htmlspecialchars($post->title); ?></h3>
                    <p><?php echo htmlspecialchars($post->body); ?></p>
                    <div class="blogpost-footer">
                       
                        
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>



    <?php require APPROOT . '/views/inc/footer.php'; ?>
</body>
</html>
