const points = document.querySelectorAll(".tourist-point");
const cityInfo = document.getElementById("cityInfo");
const infoCityName = document.getElementById("infoCityName");
const infoCityDescription = document.getElementById("infoCityDescription");
const infoCityAttractions = document.getElementById("infoCityAttractions");

// Survol d’un point → afficher l’infobulle
points.forEach(point => {
  point.addEventListener("mouseenter", (e) => {
    e.stopPropagation(); // garder la compatibilité avec le clic

    // Remplir l'infobulle avec les infos
    infoCityName.textContent = point.dataset.city;
    infoCityDescription.textContent = point.dataset.description;
    infoCityAttractions.textContent = "À visiter : " + point.dataset.attractions;

    // Positionner l'infobulle juste à côté du point
    const top = point.offsetTop;
    const left = point.offsetLeft + 25;

    cityInfo.style.top = top + "px";
    cityInfo.style.left = left + "px";

    cityInfo.classList.add("show");
  });

  point.addEventListener("mouseleave", () => {
    cityInfo.classList.remove("show");
  });
});

// Clic sur un point (ton code original reste identique)
points.forEach(point => {
  point.addEventListener("click", (e) => {
    e.stopPropagation(); // éviter que le clic ferme immédiatement

    infoCityName.textContent = point.dataset.city;
    infoCityDescription.textContent = point.dataset.description;
    infoCityAttractions.textContent = "À visiter : " + point.dataset.attractions;

    const top = point.offsetTop;
    const left = point.offsetLeft + 25;

    cityInfo.style.top = top + "px";
    cityInfo.style.left = left + "px";

    cityInfo.classList.add("show");
  });
});

// Clic ailleurs = fermer l'infobulle
document.addEventListener("click", () => {
  cityInfo.classList.remove("show");
});



// Gestion des vidéos dans la section afriba-videos
document.querySelectorAll('.afriba-videos .video-card video').forEach(video => {
  video.addEventListener('mouseenter', () => {
    video.play();
  });

  video.addEventListener('mouseleave', () => {
    video.pause();
  });
});











// Gestion des vidéos dans la grille image-grid
document.querySelectorAll('.video-card').forEach(card => {
  const video = card.querySelector('video');

  card.addEventListener('mouseenter', () => {
    video.play();
    card.querySelector('img').style.opacity = "0";   // cache l'image
    video.style.opacity = "1";                      // montre la vidéo
  });

  card.addEventListener('mouseleave', () => {
    video.pause();
    card.querySelector('img').style.opacity = "1";   // remet l'image
    video.style.opacity = "0";                      // cache la vidéo
  });
});


// commande 
const orderToggle = document.getElementById('orderListToggle');
const orderMenu = document.getElementById('orderListMenu');

orderToggle.addEventListener('click', (e) => {
  e.stopPropagation(); // empêche le click de fermer le menu immédiatement
  orderMenu.classList.toggle('show');
});

document.addEventListener('click', (e) => {
  if (!orderMenu.contains(e.target) && !orderToggle.contains(e.target)) {
    orderMenu.classList.remove('show');
  }
});











// notification
const notificationToggle = document.getElementById("notificationToggle");
const notificationMenu = document.getElementById("notificationMenu");

notificationToggle.addEventListener("click", () => {
  notificationMenu.classList.toggle("show");
});

// fermer en cliquant ailleurs
document.addEventListener("click", (e) => {
  if (!notificationToggle.contains(e.target)) {
    notificationMenu.classList.remove("show");
  }
});













// message
const messageToggle = document.getElementById("messageToggle");
const messageMenu = document.getElementById("messageMenu");
const msgPreview = document.getElementById("msgPreview");

messageToggle.addEventListener("click", () => {
  messageMenu.classList.toggle("show");
  msgPreview.style.display = "none"; // cacher l’aperçu quand on ouvre la messagerie
});

// fermer si on clique ailleurs
document.addEventListener("click", (e) => {
  if (!messageToggle.contains(e.target)) {
    messageMenu.classList.remove("show");
    msgPreview.style.display = "block"; // réafficher l’aperçu
  }
});





// livraison
const deliveryToggle = document.getElementById("deliveryToggle");
const deliveryMenu = document.getElementById("deliveryMenu");

deliveryToggle.addEventListener("click", () => {
  deliveryMenu.classList.toggle("show");
});

// fermer si clic en dehors
document.addEventListener("click", (e) => {
  if (!deliveryToggle.contains(e.target)) {
    deliveryMenu.classList.remove("show");
  }
});












const video = document.getElementById("myVideo");
const btn = document.getElementById("pauseBtn");
btn.addEventListener("click", () => {
const icon = btn.querySelector("span");
if (video.paused) {
video.play();
icon.textContent = "||"; // pause
} else {
video.pause();
icon.textContent = "▶"; // lecture
}
});










const carousel = document.querySelector('.carousel-content');
let currentIndex = 0;
const imagesPerSlide = 3;
const totalImages = carousel.children.length;
const totalSlides = Math.ceil(totalImages / imagesPerSlide);

function goToSlide(index) {
  currentIndex = index;
  const shift = index * 100; // décalage en %
  carousel.style.transform = `translateX(-${shift}%)`;
}

// Exemple navigation automatique toutes les 4 secondes (optionnel)
// setInterval(() => {
//   currentIndex = (currentIndex + 1) % totalSlides;
//   goToSlide(currentIndex);
// }, 4000);

  