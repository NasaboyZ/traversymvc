function toggleSubMenu(element) {
    var subMenu = element.nextElementSibling;
    subMenu.classList.toggle('active');
  }

  function showOptions(eventId) {
    var menu = document.getElementById('options-' + eventId);
    menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
  }

  function editEvent(eventId) {
    // Redirect to the edit page with the event ID
    window.location.href = '<?php echo URLROOT; ?>/admin/editEvent/' + eventId;
  }

  function confirmDelete(eventId) {
    if (confirm('Are you sure you want to delete this event?')) {
      // Submit a form to delete the event
      var form = document.createElement('form');
      form.method = 'POST';
      form.action = '<?php echo URLROOT; ?>/admin/deleteEvent/' + eventId;
      document.body.appendChild(form);
      form.submit();
    }
  }