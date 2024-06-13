// Selektiere das HTML-Element mit der Klasse "title-in-movement".
const margqueeContent = document.querySelector(".title-in-movement");

// Von der aktuellen Position (x: 0) zu einer Verschiebung von -2000 Pixeln auf der x-Achse.
gsap.fromTo(
  margqueeContent,
  { x: 0 },
  {
    x: -2000, // Endwerte (hier wird die Verschiebung auf -2000 Pixel auf der x-Achse gesetzt).
    duration: 50,
    ease: "none",
    repeat: -1, // Wiederholungen der Animation (hier unendlich, da -1 verwendet wird).
  }
);

const newsletter_move = document.querySelector(".move-newsletter");

// Erstelle ein Clone-Element
const cloneElement = newsletter_move.cloneNode(true);
newsletter_move.parentNode.appendChild(cloneElement);

// Definiere die Animation für das Original-Element
gsap.fromTo(
  newsletter_move,
  { x: 0 },
  { x: -2000, duration: 50, ease: "none", repeat: -1 }
);

// Definiere die Animation für das Clone-Element
gsap.fromTo(
  cloneElement,
  { x: 0 },
  { x: -2000, duration: 50, ease: "none", repeat: -1 }
);
