// Toggle the submenu when clicking on the menu item
function toggleSubMenu(element) {
  const subMenu = element.nextElementSibling;
  if (subMenu.style.display === "block") {
      subMenu.style.display = "none";
  } else {
      subMenu.style.display = "block";
  }
}
// Toggle the options menu when clicking on the ellipsis icon
function showOptions(id) {
  const optionsMenu = document.getElementById('options-' + id);
  optionsMenu.style.display = optionsMenu.style.display === 'block' ? 'none' : 'block';
}

// Add event listeners for the sidenav toggle and close icons
document.addEventListener("DOMContentLoaded", function() {
  const menuIcon = document.querySelector(".menu-icon");
  const sidenav = document.querySelector(".sidenav");
  const closeIcon = document.querySelector(".sidenav__close-icon");

  menuIcon.addEventListener("click", function() {
      sidenav.classList.toggle('active');
  });

  closeIcon.addEventListener("click", function() {
      sidenav.classList.toggle('active');
  });

  // Add event listeners for the submenu toggles
  document.querySelectorAll('.sidenav__list-item > span').forEach(item => {
      item.addEventListener('click', function() {
          const subMenu = this.nextElementSibling;
          subMenu.classList.toggle('active');
      });
  });
});


// If menu icon is clicked, it will automatically add the new class 'active' to the 'sidenav' component
menuIconEl.addEventListener('click', function() {
    toggleClassName(sidenavEl, 'active');
});

sidenavCloseEl.addEventListener('click', function() {
    toggleClassName(sidenavEl, 'active');
});

// Toggle the submenu when clicking on the menu item
function toggleSubMenu(element) {
  const subMenu = element.nextElementSibling;
  if (subMenu.style.display === "block") {
      subMenu.style.display = "none";
  } else {
      subMenu.style.display = "block";
  }
}

// Show options menu when clicking on the ellipsis icon
function showOptions(id) {
  const optionsMenu = document.getElementById("options-" + id);
  if (optionsMenu.style.display === "block") {
      optionsMenu.style.display = "none";
  } else {
      optionsMenu.style.display = "block";
  }
}

document.querySelectorAll('.sidenav__list-item > span').forEach(item => {
  item.addEventListener('click', () => toggleSubMenu(item));
});
