// Funktion zum animierten Zahlenwechsel auf der Webseite
function animateNumber(elementId, targetNumber, options = {}) {
  const element = document.getElementById(elementId);

  // Startwert der Zahl, falls bereits vorhanden, sonst 0
  const startNumber = parseFloat(element.textContent) || 0;

  //  dauer der animation
  const duration = options.duration || 1000;

  const postfix = options.postfix || "";

  const fixed = options.fixed || 0;

  function animate(progress) {
    // Berechne den aktuellen Fortschritt
    const percentage = Math.min(progress, 1);

    const currentNumber =
      startNumber + percentage * (targetNumber - startNumber);

    element.textContent = currentNumber.toFixed(fixed) + postfix;

    // Wenn die Animation noch nicht abgeschlossen ist warte und schliesse ab
    if (progress < 1) {
      requestAnimationFrame(() => animate(progress + 0.01));
    }
  }

  function handleIntersection(entries) {
    const entry = entries[0];

    // Starte die Animation, wenn das Element sichtbar wird oder bleibt
    if (entry.isIntersecting) {
      animate(0);
    } else {
      // Starte die Animation ebenfalls, wenn das Element nicht sichtbar ist
      requestAnimationFrame(() => animate(0));
    }
  }

  // Erstelle einen Überwachungsmechanismus für Sichtbarkeitsänderungen
  const observer = new IntersectionObserver(handleIntersection, {
    threshold: 1, // Starte die Animation, wenn das Element vollständig sichtbar ist
  });

  // Überwache das Element
  observer.observe(element);
}

animateNumber("num-2", 58000, { duration: 5000, postfix: "+" });
animateNumber("num-3", 890, { duration: 5000, postfix: "+" });
animateNumber("num-4", 86, { duration: 5000, postfix: "+" });
