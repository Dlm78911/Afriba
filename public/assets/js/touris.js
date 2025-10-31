// ==========================
// ==== POINTS TOURISTIQUES ====
// ==========================
const points = document.querySelectorAll(".tourist-point");
const cityInfo = document.getElementById("cityInfo");
const infoCityName = document.getElementById("infoCityName");
const infoCityDescription = document.getElementById("infoCityDescription");
const infoCityAttractions = document.getElementById("infoCityAttractions");

points.forEach(point => {
  const showInfo = () => {
    infoCityName.textContent = point.dataset.city;
    infoCityDescription.textContent = point.dataset.description;
    infoCityAttractions.textContent = "À visiter : " + point.dataset.attractions;
    const top = point.offsetTop;
    const left = point.offsetLeft + 25;
    cityInfo.style.top = top + "px";
    cityInfo.style.left = left + "px";
    cityInfo.classList.add("show");
  };

  point.addEventListener("mouseenter", (e) => {
    e.stopPropagation();
    showInfo();
  });

  point.addEventListener("mouseleave", () => {
    cityInfo.classList.remove("show");
  });

  point.addEventListener("click", (e) => {
    e.stopPropagation();
    showInfo();
  });
});

document.addEventListener("click", () => {
  cityInfo.classList.remove("show");
});

// ==========================
// ==== VIDEOS ISOLÉES ====
// ==========================
document.addEventListener('DOMContentLoaded', () => {

  // 1️⃣ AFRIBA VIDEOS (joue seulement au survol, pause quand souris quitte, reprend là où elle s'était arrêtée)
  document.querySelectorAll(".afriba-videos .video-card").forEach(card => {
    const video = card.querySelector("video");

    card.addEventListener("mouseenter", () => {
      video.play();
      card.classList.add("playing");
    });

    card.addEventListener("mouseleave", () => {
      video.pause();
      card.classList.remove("playing");
    });
  });

  // 2️⃣ IMAGE GRID VIDEOS (toujours jouer, survol ne pause pas)
  document.querySelectorAll('.image-grid .video-card').forEach(card => {
    const video = card.querySelector('video');
    const img = card.querySelector('img');
    video.play();
    video.style.opacity = "1";
    if(img) img.style.opacity = "0";
  });

  // 3️⃣ RECALL-BANNER VIDEO (toujours jouer, survol ne pause pas, bouton pause contrôle)
  const recallBlock = document.querySelector(".recall-banner .video-block");
  if(recallBlock){
    const recallVideo = recallBlock.querySelector("video");
    const pauseBtn = document.getElementById("pauseBtn");
    recallVideo.play();

    // bouton pause
    pauseBtn.addEventListener("click", () => {
      const icon = pauseBtn.querySelector("span");
      if(recallVideo.paused){
        recallVideo.play();
        icon.textContent = "||";
      } else {
        recallVideo.pause();
        icon.textContent = "▶";
      }
    });

    // PAS de pause au survol pour recall-banner
  }

});




document.addEventListener('DOMContentLoaded', () => {
  const favBtns = document.querySelectorAll('.fav-btn');

  favBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault(); // empêche tout comportement par défaut
      btn.classList.toggle('active'); // toggle classe active
      btn.textContent = btn.classList.contains('active') ? '❤️' : '♡'; // change symbole
    });
  });
});
