//Hamburger Icon

function toggleMenu() {
  let icon = document.getElementById("ham-icon");
  icon.classList.toggle("change");
  const hamNav = document.querySelector(".ham-nav");
  hamNav.classList.toggle("active");

  const joinBttn = document.querySelector(".bttn-in-hero");

  joinBttn.style.visibility = hamNav.classList.contains("active")
    ? "hidden"
    : "visible";
}

//infinit scroller Animaiton Hero
const scrollers = document.querySelectorAll(".scroller");

// if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
//   addAnimation();
// }
