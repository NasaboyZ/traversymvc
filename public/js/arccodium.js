// Warte, bis das DOM (Document Object Model) vollständig geladen ist
document.addEventListener("DOMContentLoaded", function () {
  // Akkordeon-Funktionalität
  const arccodion = document.getElementsByClassName("contentBx");
  for (let i = 0; i < arccodion.length; i++) {
    // Füge einen Eventlistener für jedes Element mit der Klasse "contentBx" hinzu
    arccodion[i].addEventListener("click", function () {
      // Wenn ein Element mit der Klasse "contentBx" geklickt wird, ändere die "active"-Klasse
      this.classList.toggle("active");
    });
  }

  // Mobile Navigation
  const mainMenu = document.querySelector(".mainMenu");
  const closeMenu = document.querySelector(".closeMenu");
  const openMenu = document.querySelector(".openMenu");
  const menu_items = document.querySelectorAll("nav .mainMenu li a");

  // Eventlistener für das Öffnen des Menüs
  openMenu.addEventListener("click", show);

  // Eventlistener für das Schliessen des Menüs
  closeMenu.addEventListener("click", close);

  // Eventlistener für Menüpunkte, um das Menü zu schließen
  menu_items.forEach((item) => {
    item.addEventListener("click", function () {
      // Bei Klick auf einen Menüpunkt wird die Funktion zum Schließen des Menüs aufgerufen
      close();
    });
  });

  // Funktion zum Anzeigen des Menüs
  function show() {
    // Ändere den CSS-Stil des Hauptmenüs, um es anzuzeigen
    mainMenu.style.display = "flex";
    mainMenu.style.top = "0";
  }

  // Funktion zum Schließen des Menüs
  function close() {
    // Ändere den CSS-Stil des Hauptmenüs, um es nach oben zu verschieben und zu schließen
    mainMenu.style.top = "-100%";
  }
});
