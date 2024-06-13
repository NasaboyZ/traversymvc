getData();

async function getData() {
  const response = await fetch("api/dummy.json");
  const data = await response.json();

  // Zeige die Blog-Posts nacheinander an
  for (const blog of data) {
    // Rufe die Funktion displayData für jeden Blog-Post auf
    await displayData(blog);
  }
}

// Definiere eine Funktion namens displayData, die die abgerufenen Daten als Parameter erhält
async function displayData(blog) {
  // Erstelle ein neues div-Element, um einen Blog-Beitrag zu repräsentieren
  const blogPost = document.createElement("div");

  // Füge dem erstellten div die Klasse 'container-aussen' hinzu
  blogPost.classList.add("container-aussen");

  // Setze den inneren HTML-Inhalt des div mit Informationen aus dem Blog-Objekt
  blogPost.innerHTML = `
    <span class="date">${blog.date}</span>

    <div class="profilbild-container">
        <img class="profilbild" src="assets/bilder/${
          blog.thumbnail[1]
        }" srcset="assets/bilder/${blog.thumbnail[0]}" alt="${blog.alt}">
    </div>
    <div class="container-for-title">
        <p class="sub blog-post-sub">${blog.title}</p>
    </div>
    <div class="text blog-post">
        <p>${blog.body}</p>
    </div>
    <div class="pic">
        <img class="img-in-pic" src="assets/bilder/${
          blog.pic[1]
        }" srcset="assets/bilder/${blog.pic[0]}"  alt="${blog.altsecond}">
    </div>

    <span class="arrow-up"><i class="post-arrows fa-solid fa-circle-arrow-down"></i></span>
    <span class="counter">${blog.post_id}</span>
    <span class="arrow-down"><i class="post-arrows fa-solid fa-circle-arrow-up"></i></span>

    <div class="hashtaks-container">
        <span class="hashtaks">${blog.tags.join(", ")}</span>
    </div>
  `;

  // Hänge das erstellte Blog-Beitrag-div an das Element mit der Klasse 'main'
  document.querySelector(".api").appendChild(blogPost);

  // Füge einen kurzen Timeout hinzu, um eine Verzögerung zwischen den Blog-Posts zu schaffen
  await new Promise((resolve) => setTimeout(resolve, 3000)); // Warte 1 Sekunde (kann angepasst werden)
}
