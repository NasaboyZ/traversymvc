// Funktion zum Umschalten des Untermenüs
function toggleSubMenu(element) {
  var subMenu = element.nextElementSibling;
  subMenu.classList.toggle('active');
}

// Funktion zum Anzeigen der Optionen
function showOptions(eventId) {
  var menu = document.getElementById('options-' + eventId);
  menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
}

// Funktion zum Bearbeiten des Events
function editEvent(eventId) {
  // Redirect to the edit page with the event ID
    window.location.href = '<?php echo URLROOT; ?>/admin/editEvent/' + eventId;
}

// Funktion zur Bestätigung des Löschens
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

// Funktion zum Umschalten der Sidebar
function toggleSidebar() {
  const sidebar = document.querySelector('.sidenav');
  sidebar.classList.toggle('active');
}

// Funktion zum Umschalten des Untermenüs
function toggleSubMenu(element) {
  const subMenu = element.nextElementSibling;
  subMenu.classList.toggle('active');
}

// Event Listener für das Burger-Menü
document.querySelector('.menu-icon').addEventListener('click', toggleSidebar);

// Event Listener für die Schließen-Schaltfläche der Sidebar
document.querySelector('.sidenav__close-icon').addEventListener('click', toggleSidebar);

// Event Listener für das Untermenü
document.querySelectorAll('.sidenav__list-item > span').forEach(item => {
  item.addEventListener('click', () => toggleSubMenu(item));
});
