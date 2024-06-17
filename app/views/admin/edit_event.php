<?php require APPROOT . '/views/inc/head/head.edit_event.php'; ?>

<body>
    <div class="container">
        <header>
            <div id="branding">
                <h1><span class="highlight">Mue Wear</span> Collectiv</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="<?php echo URLROOT; ?>/admin/dashboard">Dashboard</a></li>
                    <li><a href="<?php echo URLROOT; ?>/admin/logout">Logout</a></li>
                </ul>
            </nav>
        </header>

        <h2>Edit Event</h2>
        <form action="<?php echo URLROOT; ?>/admin/editEvent/<?php echo $data['id']; ?>" method="POST">
            <div class="form-group">
                <label for="event_title">Event Title: <sup>*</sup></label>
                <input type="text" name="event_title" class="form-control" value="<?php echo $data['title']; ?>">
                <span class="invalid-feedback"><?php echo $data['title_err'] ?? ''; ?></span>
            </div>
            <div class="form-group">
                <label for="event_description">Event Description: <sup>*</sup></label>
                <textarea name="event_description" class="form-control"><?php echo $data['description']; ?></textarea>
                <span class="invalid-feedback"><?php echo $data['description_err'] ?? ''; ?></span>
            </div>
            <div class="form-group">
                <label for="event_date">Event Date: <sup>*</sup></label>
                <input type="date" name="event_date" class="form-control" value="<?php echo $data['date']; ?>">
                <span class="invalid-feedback"><?php echo $data['date_err'] ?? ''; ?></span>
            </div>
            <input type="submit" class="btn" value="Save Changes">
        </form>
    </div>
    <footer class="footer">
      <div class="footer__copyright">&copy; 2024 Josef Leite</div>
    </footer>
</body>
</html>
