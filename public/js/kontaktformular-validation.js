//Focusoout
document
  .querySelector("#firstname")
  .addEventListener("focusout", validateField);
document
  .querySelector("#secondName")
  .addEventListener("focusout", validateField);
document.querySelector("#ort").addEventListener("focusout", validateField);
document.querySelector("#plz").addEventListener("focusout", validateField);
document.querySelector("#adresse").addEventListener("focusout", validateField);
document.querySelector("#email").addEventListener("focusout", validateField);
document.querySelector("#message").addEventListener("focusout", validateField);
document.querySelector("#submit").addEventListener("click", kontaktFormular);

// Funktion zur Validierung eines einzelnen Feldes (wird auch für focusout verwendet)
function validateField(e) {
  const fieldName = e.target.id;
  const fieldValue = e.target.value;
  let fehlerMeldungen = {};

  document.querySelectorAll(".Fehler").forEach((element) => element.remove());

  switch (fieldName) {
    case "firstname":
      // Validierung für den Vornamen hier durchführen
      if (!fieldValue) {
        fehlerMeldungen[fieldName] = "Hallo, da ist nichts!";
      } else {
        const namenRegex = /^[A-Za-z]+$/;
        if (!namenRegex.test(fieldValue)) {
          fehlerMeldungen[fieldName] =
            "Es tut uns leider leid, aber könnte es sein, dass dies nicht dein Name ist!?";
        } else {
          console.info("firstname: ", fieldValue);
        }
      }
      break;

    case "secondName":
      // Validierung für den Nachnamen hier durchführen
      if (!fieldValue) {
        fehlerMeldungen[fieldName] = "Hallo, da ist nichts!";
      } else {
        const secondnameRegex = /^[A-Za-z]+$/;
        if (!secondnameRegex.test(fieldValue)) {
          fehlerMeldungen[fieldName] =
            "Es tut uns sehr leid aber diese Namen Combinantion geht nicht auf unsere Webseite!";
        } else {
          console.info("secondname: ", fieldValue);
        }
      }
      break;

    case "ort":
      if (!fieldValue) {
        fehlerMeldungen[fieldName] = "Hallo, da ist nichts!";
      } else {
        const ortnameRegex = /^[A-Za-zÄäÖöÜüß\s,.'-]+$/;
        if (!ortnameRegex.test(fieldValue)) {
          fehlerMeldungen[fieldName] =
            "Es tut uns leider aber zahlen in einer Ortschaft gibt es seit dem ersten Hexen Circel nicht! wünsche neue Werte";
        } else {
          console.info("ortname: ", fieldValue);
        }
      }
      break;

    case "plz":
      if (!fieldValue) {
        fehlerMeldungen[fieldName] = "Hallo, da ist nichts!";
      } else {
        const numbersOnlyRegex = /^[0-9]+$/;
        if (!numbersOnlyRegex.test(fieldValue)) {
          fehlerMeldungen[fieldName] =
            "Es tut uns sehr leid, aber hier brauche ich eine Zahl";
        } else {
          console.info("plz: ", fieldValue);
        }
      }
      break;
    case "adresse":
      // Validierung für die Adresse hier durchführen
      if (!fieldValue) {
        fehlerMeldungen[fieldName] = "Hallo, da ist nichts!";
      } else {
      }
      break;
    case "email":
      // Validierung für die Email hier durchführen
      if (!fieldValue) {
        fehlerMeldungen[fieldName] = "Hallo, da ist nichts!";
      } else {
        const emailRegexVariable =
          /^(?!.*(?:\b(?:Vorname|Nachname|Name1|Name2)\b))(?!.*\b(?:gmail|yahoo|hotmail)\b)(?!.*\b(?:co|cos|cor|cot)\b)(?!.*\d)[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailRegexVariable.test(fieldValue)) {
          fehlerMeldungen[fieldName] = "Die Email stimmt nicht, du Lügner!";
        } else {
          console.info("email: ", fieldValue);
        }
      }
      break;
    case "message":
      // Validierung für die Nachricht hier durchführen
      if (!fieldValue) {
        fehlerMeldungen[fieldName] = "Hallo, da ist nichts!";
      } else {
        if (fieldValue.length < 30) {
          fehlerMeldungen[fieldName] =
            "Ein bisschen mehr Fleisch am Knochen bitte!";
        } else {
          console.info("nachricht:", fieldValue);
        }
      }
      break;
  }

  // Falls Fehler vorhanden sind, diese anzeigen
  if (Object.keys(fehlerMeldungen).length > 0) {
    // Erstelle und zeige Fehlermeldungen an
    Object.keys(fehlerMeldungen).forEach((key) => {
      const fehlerSpan = document.createElement("span");
      fehlerSpan.classList.add("Fehler");
      fehlerSpan.innerHTML = fehlerMeldungen[key];
      document.getElementById(key).after(fehlerSpan);
    });
  }
}

//Eventlistner wird zum submitbutton verbunden
document.querySelector("#submit").addEventListener("click", kontaktFormular);

//kontaktformular wird hier beschrieben
function kontaktFormular(e) {
  // stopt submit knopf von neu laden
  e.preventDefault();
  //hier folgt eine funtion die uns von fehler meldunden aufhaltet
  document.querySelectorAll("span").forEach((element) => element.remove());
  // const oneSpan = document.querySelectorAll("span");
  // oneSpan.forEach((oneSpan) => {
  //   oneSpan.remove();
  // });
  //hier speicheren wir form input
  let data = {};
  //hier speichern wir fehler
  let fehlerMeldungen = {};

  // alle Propertys zum data variabln hinzufügen
  // somit werden die werte der eingaben gespeichert

  data.firstName = document.querySelector("#firstname").value;
  data.secondName = document.querySelector("#secondName").value;
  data.adresse = document.querySelector("#adresse").value;
  data.plz = document.querySelector("#plz").value;
  data.ort = document.querySelector("#ort").value;
  data.email = document.querySelector("#email").value;
  data.message = document.querySelector("#message").value;

  //form validation vom ersten Namen,
  // ! = wenn wert nicht da ist

  if (!data.firstName) {
    fehlerMeldungen.firstName = "Hallo da ist nichts";
  } else {
    const namenRedex = /^[A-Za-z]+$/;
    if (!namenRedex.test(data.firstName)) {
      fehlerMeldungen.firstName =
        "Es tut uns leider aber kann es sein das es nicht dein Name ist!?";
    } else {
      console.info("firstname: ", data.firstName);
      s;
    }
    console.info("First Name: ", data.firstName);
  }

  if (!data.secondName) {
    fehlerMeldungen.secondName = "Hallo da ist nichts";
  } else {
    const secondnameRegex = /^[A-Za-z]+$/;
    if (!secondnameRegex.test(data.adresse)) {
      fehlerMeldungen.firstName =
        "Es tut uns leider aber kann es sein das es nicht dein Name ist!?";
    } else {
      console.info("secondname: ", data.adresse);
    }
  }

  if (!data.adresse) {
    fehlerMeldungen.adresse = "Hallo da ist nichts";
  } else {
    console.info("adresse: ", data.adresse);
  }

  if (!data.plz) {
    fehlerMeldungen.plz = "Hallo da ist nichts";
  } else {
    const numbersOnlyRegex = /^[0-9]+$/;
    if (!numbersOnlyRegex.test(data.plz)) {
      fehlerMeldungen.plz =
        "Es tut uns Sehr leid aber ich brauche Hier eine Zahl";
    } else {
      console.info("plz: ", data.plz);
    }
  }

  if (!data.ort) {
    fehlerMeldungen.ort = "Hallo da ist nichts";
  } else {
    const noNumbersRegex = /^[A-Za-zÄäÖöÜüß\s,.'-]+$/;
    if (!noNumbersRegex.test(data.ort)) {
      fehlerMeldungen.ort =
        " Ich kenne keinen Ort der mit Zahlen geschrieben wird frag google du spinnst!";
    } else {
      console.info("ort: ", data.ort);
    }
  }

  if (!data.email) {
    fehlerMeldungen.email = "Hallo da ist nichts";
  } else {
    const emailRegexVariable = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    // mit diesen testem wir ob email valide ist nach regex
    if (!emailRegexVariable.test(data.email)) {
      fehlerMeldungen.email = "die Email stimmt nicht du lügner!";
      // console.log("stimmt nicht");
    } else {
      console.info("email: ", data.email);
    }
  }

  if (!data.message) {
    fehlerMeldungen.message = "Hallo da ist nichts";
  } else {
    if (data.message.length < 30) {
      fehlerMeldungen.message = "ein bischen mehr fleisch am Knochen bitte!";
    } else {
      console.info("nachricht:", data.message);
    }
  }

  // function erstellen um die fehelrMeldungen anzuzeigen im HTML
  function displayError(fehlerMeldungen) {
    if (fehlerMeldungen.firstName) {
      //erstelle ein span ellement
      const fehlerSpan = document.createElement("span");
      //die noch ne klasse erstellen
      fehlerSpan.classList.add("Fehler");
      // klasse hinzufügen
      fehlerSpan.innerHTML = fehlerMeldungen.firstName;
      //firstname in html auswählen und hängt fehlerspan an falls nichts stimmt
      document.querySelector("#firstname").after(fehlerSpan);
    }

    if (fehlerMeldungen.secondName) {
      //erstelle ein span ellement
      const fehlerSpan = document.createElement("span");
      //die noch ne klasse erstellen
      fehlerSpan.classList.add("Fehler");
      // klasse hinzufügen
      fehlerSpan.innerHTML = fehlerMeldungen.secondName;
      //firstname in html auswählen und hängt fehlerspan an falls nichts stimmt
      document.querySelector("#secondName").after(fehlerSpan);
    }

    if (fehlerMeldungen.adresse) {
      //erstelle ein span ellement
      const fehlerSpan = document.createElement("span");
      //die noch ne klasse erstellen
      fehlerSpan.classList.add("Fehler");
      // klasse hinzufügen
      fehlerSpan.innerHTML = fehlerMeldungen.adresse;
      //firstname in html auswählen und hängt fehlerspan an falls nichts stimmt
      document.querySelector("#adresse").after(fehlerSpan);
    }

    if (fehlerMeldungen.plz) {
      //erstelle ein span ellement
      const fehlerSpan = document.createElement("span");
      //die noch ne klasse erstellen
      fehlerSpan.classList.add("Fehler");
      // klasse hinzufügen
      fehlerSpan.innerHTML = fehlerMeldungen.plz;
      //firstname in html auswählen und hängt fehlerspan an falls nichts stimmt
      document.querySelector("#plz").after(fehlerSpan);
    }

    if (fehlerMeldungen.ort) {
      //erstelle ein span ellement
      const fehlerSpan = document.createElement("span");
      //die noch ne klasse erstellen
      fehlerSpan.classList.add("Fehler");
      // klasse hinzufügen
      fehlerSpan.innerHTML = fehlerMeldungen.ort;
      //firstname in html auswählen und hängt fehlerspan an falls nichts stimmt
      document.querySelector("#ort").after(fehlerSpan);
    }

    if (fehlerMeldungen.email) {
      //erstelle ein span ellement
      const fehlerSpan = document.createElement("span");
      //die noch ne klasse erstellen
      fehlerSpan.classList.add("Fehler");
      // klasse hinzufügen
      fehlerSpan.innerHTML = fehlerMeldungen.email;
      //firstname in html auswählen und hängt fehlerspan an falls nichts stimmt
      document.querySelector("#email").after(fehlerSpan);
    }
    if (fehlerMeldungen.message) {
      //erstelle ein span ellement
      const fehlerSpan = document.createElement("span");
      //die noch ne klasse erstellen
      fehlerSpan.classList.add("Fehler");
      // klasse hinzufügen
      fehlerSpan.innerHTML = fehlerMeldungen.message;
      //firstname in html auswählen und hängt fehlerspan an falls nichts stimmt
      document.querySelector("#message").after(fehlerSpan);
    }
  }

  //wir schicken die Daten in den Backennd wie brötchen beim bäcker
  if (Object.keys(fehlerMeldungen).length > 0) {
    //anzeigen unsere fehler meldungen
    displayError(fehlerMeldungen);
  } else {
    console.log("Backend bitte haha");
  }
}
