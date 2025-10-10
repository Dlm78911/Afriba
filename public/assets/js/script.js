// ======================
// Navbar qui change au scroll
// ======================
window.addEventListener("scroll", function () {
  const navbar = document.getElementById("navbar");
  if (window.scrollY > 50) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
});

// ======================
// Slider avec texte animé
// ======================
const slides = document.querySelectorAll(".slide");
let current = 0;

// Fonction pour taper le texte
function typeText(element, text, speed = 10) {
  element.textContent = "";
  element.style.opacity = 1; // assure que le texte est visible
  let i = 0;
  return new Promise((resolve) => {
    const interval = setInterval(() => {
      element.textContent += text[i];
      i++;
      if (i >= text.length) {
        clearInterval(interval);
        resolve();
      }
    }, speed);
  });
}

// Fonction pour faire disparaître le texte doucement
function fadeOutText(element, duration = 1000) {
  return new Promise((resolve) => {
    element.style.transition = `opacity ${duration}ms`;
    element.style.opacity = 0;
    setTimeout(resolve, duration);
  });
}

// Afficher une slide
async function showSlide(index) {
  slides.forEach(slide => slide.classList.remove("active"));
  const slide = slides[index];
  slide.classList.add("active");

  const caption = slide.querySelector(".slide-caption");
  if (!caption) return;

  const text = caption.getAttribute("data-text");
  await typeText(caption, text, 40);        // texte qui s'affiche lentement
  await new Promise(r => setTimeout(r, 2000)); // pause après texte complet
  await fadeOutText(caption);                // texte disparaît doucement
}

// Démarrer le slider en boucle
async function startSlider() {
  while (true) {
    await showSlide(current);
    current = (current + 1) % slides.length;
  }
}

document.addEventListener("DOMContentLoaded", startSlider);

// ======================
// Gestion des menus (drapeau, panier, message, connexion, recherche)
// ======================
function setupToggle(toggleId, menuId) {
  const toggle = document.getElementById(toggleId);
  const menu = document.getElementById(menuId);

  if (!toggle || !menu) return;

  toggle.addEventListener("click", () => {
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
  });

  document.addEventListener("click", (e) => {
    if (!toggle.contains(e.target) && !menu.contains(e.target)) {
      menu.style.display = "none";
    }
  });
}

// Appliquer à tous les menus
setupToggle("flagToggle", "flagMenu");
setupToggle("cartToggle", "cartMenu");
setupToggle("messageToggle", "messageMenu");
setupToggle("connexionToggle", "connexionMenu");
setupToggle("searchToggle", "searchMenu");
setupToggle("orderListToggle", "orderListMenu");



// ======================
// Custom select
// ======================
document.querySelectorAll('.custom-select').forEach(select => {
  const selected = select.querySelector('.selected');
  const options = select.querySelector('.options');
  const arrow = selected.querySelector('.arrow');
  const textSpan = selected.querySelector('.text');

  selected.addEventListener('click', () => {
    const isOpen = options.style.display === 'block';
    document.querySelectorAll('.custom-select .options').forEach(opt => opt.style.display = 'none');
    document.querySelectorAll('.custom-select').forEach(sel => sel.classList.remove('active'));

    if (!isOpen) {
      options.style.display = 'block';
      select.classList.add('active');
    }
  });

  options.querySelectorAll('div').forEach(option => {
    option.addEventListener('click', () => {
      const img = option.querySelector('img').outerHTML;
      const country = option.textContent.trim();
      textSpan.innerText = country;
      selected.insertBefore(option.querySelector('img').cloneNode(), textSpan);
      options.style.display = 'none';
      select.classList.remove('active');
    });
  });

  document.addEventListener('click', (e) => {
    if (!select.contains(e.target)) {
      options.style.display = 'none';
      select.classList.remove('active');
    }
  });
});




 const video = document.getElementById("bgVideo");
    const toggleBtn = document.getElementById("toggleBtn");

    toggleBtn.addEventListener("click", () => {
      if (video.paused) {
        video.play();
        toggleBtn.textContent = "❚❚"; // Icône pause
      } else {
        video.pause();
        toggleBtn.textContent = "▶"; // Icône play
      }
    });





// commande
  
