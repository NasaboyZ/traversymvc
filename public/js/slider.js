document.addEventListener("DOMContentLoaded", function () {
  const slides = document.querySelectorAll(".slide");
  let currentSlideIndex = 0;
  let autoplayInterval;

  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.style.display = i === index ? "block" : "none";
    });
  }

  function nextSlide() {
    currentSlideIndex = (currentSlideIndex + 1) % slides.length;
    showSlide(currentSlideIndex);
  }

  function prevSlide() {
    currentSlideIndex = (currentSlideIndex - 1 + slides.length) % slides.length;
    showSlide(currentSlideIndex);
  }

  function startAutoplay() {
    autoplayInterval = setInterval(nextSlide, 3000);
  }

  function stopAutoplay() {
    clearInterval(autoplayInterval);
  }

  function toggleAutoplay() {
    if (autoplayInterval) {
      stopAutoplay();
    } else {
      startAutoplay();
    }
  }

  document.getElementById("nextBtn").addEventListener("click", () => {
    stopAutoplay();
    nextSlide();
    startAutoplay();
  });

  document.getElementById("prevBtn").addEventListener("click", () => {
    stopAutoplay();
    prevSlide();
    startAutoplay();
  });

  const playButton = document.querySelector(" .play_arrow");
  if (playButton) {
    playButton.addEventListener("click", () => {
      startAutoplay();
    });
  } else {
    console.error("Element nicht gefunden: .pause-and-play-btn .play_arrow");
  }

  const pauseButton = document.querySelector(".pause-button");
  if (pauseButton) {
    pauseButton.addEventListener("click", () => {
      stopAutoplay();
    });
  } else {
    console.error("Element nicht gefunden: .pause-and-play-btn .pause-button");
  }

  showSlide(currentSlideIndex);
  startAutoplay();
});
