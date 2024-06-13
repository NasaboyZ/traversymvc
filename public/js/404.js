document.getElementById('homeButton').addEventListener('click', function() {
    window.location.href = '/';
});

// Hund Ohren wackeln lassen
gsap.fromTo("#dog .left-ear", {
    rotation: -20
}, {
    duration: 0.5,
    rotation: 20,
    yoyo: true,
    repeat: -1,
    ease: "sine.inOut"
});

gsap.fromTo("#dog .right-ear", {
    rotation: 20
}, {
    duration: 0.5,
    rotation: -20,
    yoyo: true,
    repeat: -1,
    ease: "sine.inOut"
});

// Schwanz wedeln lassen
gsap.fromTo("#dog .tail", {
    rotation: -45
}, {
    duration: 0.5,
    rotation: 45,
    yoyo: true,
    repeat: -1,
    ease: "sine.inOut"
});

// Hund hin und her laufen lassen
gsap.fromTo("#dog", {
    x: -20
}, {
    duration: 1,
    x: 20,
    yoyo: true,
    repeat: -1,
    ease: "sine.inOut"
});
