// Fonction - Navbar
// Sélectionner la barre de navigation et les sections
const navbar = document.querySelector(".navbar"); // Sélectionne le nav avec la classe .navbar
const accueilSection = document.getElementById("Accueil"); // Sélectionne la section#Accueil
const aproposSection = document.getElementById("A_propos"); // Sélectionne la section#Apropos
const competencesSection = document.getElementById("Competences"); // Sélectionne la section#Competences
const projetsSection = document.getElementById("Projets"); // Sélectionne la section#Projets
const contactSection = document.getElementById("Contact"); // Sélectionne la section#Contact

// Fonction pour ajuster le padding des sections (et la hauteur de la section Accueil)
function adjustSectionPadding() {
  // Obtenir la hauteur de la barre de navigation
  const navbarHeight = navbar.offsetHeight;

  // Ajuste le padding-top des sections en fonction de la hauteur de la navbar
  accueilSection.style.paddingTop = `${navbarHeight}px`;
  accueilSection.style.minHeight = `calc(100vh - ${navbarHeight * 2}px)`; // Ajuster la hauteur minimale de la section Accueil
  aproposSection.style.paddingTop = `${navbarHeight}px`;
  competencesSection.style.paddingTop = `${navbarHeight}px`;
  projetsSection.style.paddingTop = `${navbarHeight}px`;
  contactSection.style.paddingTop = `${navbarHeight}px`;
}

// Appeler la fonction pour ajuster le padding lors du chargement de la page
adjustSectionPadding();

// Ajouter un événement pour ajuster le padding lorsque la taille de la fenêtre change
window.addEventListener("resize", () => {
  // Mettre à jour le padding-top à chaque redimensionnement de la fenêtre
  adjustSectionPadding();
});
// Fonction - compétences

document.addEventListener("DOMContentLoaded", () => {
  const observer = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const bars = entry.target.querySelectorAll("span.bar span");
          bars.forEach((bar) => {
            const skillClass = bar.dataset.skill;
            bar.classList.add(skillClass);
          });
          observer.unobserve(entry.target); // Une seule animation par scroll
        }
      });
    },
    {
      threshold: 0.3, // 30% de visibilité
    }
  );

  const section = document.querySelector("#Competences");
  if (section) observer.observe(section);
});

document.addEventListener("DOMContentLoaded", () => {
  const competenceLinks = document.querySelectorAll('a[href="#Competences"]');
  const competenceSection = document.querySelector("#Competences");

  const resetAndAnimateSkills = () => {
    const bars = competenceSection.querySelectorAll("span.bar span");

    bars.forEach((bar) => {
      const skillClass = bar.dataset.skill;

      // Supprime la classe pour réinitialiser la largeur
      bar.classList.remove(skillClass);

      // Forcer un reflow pour que le retrait soit pris en compte
      void bar.offsetWidth;

      // Reappliquer la classe après un petit délai (pour relancer l'animation)
      setTimeout(() => {
        bar.classList.add(skillClass);
      }, 100); // petit délai suffisant pour rejouer l'animation
    });
  };

  competenceLinks.forEach((link) => {
    link.addEventListener("click", () => {
      // On utilise setTimeout pour attendre que le scroll ait lieu
      setTimeout(() => {
        resetAndAnimateSkills();
      }, 500); // Ajuste si nécessaire selon la vitesse du scroll
    });
  });
});

// Fonction - Projets

// Simule une liste d'images PNG dans le dossier /images/
const dossierImages = "./Projets/";
const listeImages = [
  "Accueil.png",
  "Galerie.png",
  "Galerie - Mobile.png",
  "Crypto.png",
  "Crypto - Light.png",
  "Carrousel.png",
  "Lightbox.png",
  "Contact.png",
  "Navbar.png",
  "Moineau.png",
];

// Crée l'élément <ul class="galerie-grid">
const galerieUl = document.createElement("ul");
galerieUl.className = "galerie-grid";

// Pour chaque image, créer un <li class="galerie-item"><img ...></li>
listeImages.forEach((nomFichier) => {
  const li = document.createElement("li");
  li.className = "galerie-item";

  const img = document.createElement("img");
  img.src = `${dossierImages}${nomFichier}`;
  img.alt = nomFichier.replace(".png", ""); // Enlève l'extension pour l'attribut alt

  const h3 = document.createElement("h3");
  h3.textContent = nomFichier.replace(".png", ""); // Enlève l'extension pour le titre
  h3.className = "galerie-title";

  li.append(img, h3);
  galerieUl.appendChild(li);
});

// Ajoute la galerie au conteneur
document.getElementById("Projets").appendChild(galerieUl);

// Lightbox

const lightbox = document.createElement("div");
lightbox.id = "lightbox";

const lightboxImg = document.createElement("img");
lightboxImg.id = "lightbox-img";
lightboxImg.className = "lightbox-content";

const lightboxClose = document.createElement("i");
lightboxClose.className = "close";
lightboxClose.setAttribute("aria-label", "Fermer la lightbox");
lightboxClose.innerHTML = "&times;"; // Symbole de fermeture

lightbox.append(lightboxImg, lightboxClose);
document.getElementById("Projets").appendChild(lightbox);

// Lightbox.js
// Sélection des éléments du DOM nécessaires
const galleryItems = document.querySelectorAll(".galerie-item img");
const closeBtn = document.querySelector(".close");

// Vitesse de déplacement lors du drag
const dragSpeed = 1.5;

// Niveau de zoom (2x par défaut)
let zoomLevel = 2;

// Empêche le comportement par défaut de drag d'image
lightboxImg.setAttribute("draggable", "false");

// Variables d'état pour le zoom et le déplacement (drag)
let isZoomed = false; // L'image est-elle zoomée ?
let isDragging = false; // Est-on en train de déplacer l'image ?
let hasDragged = false; // A-t-on déplacé (pour éviter le zoom lors d’un clic)?
let canDrag = false; // Le drag a-t-il commencé sur l’image ?
let startX = 0,
  startY = 0; // Position de départ de la souris
let initialX = 0,
  initialY = 0; // Position actuelle de l'image

// Lorsqu'on clique sur une image de la galerie, ouvrir la lightbox
galleryItems.forEach((item) => {
  item.addEventListener("click", (e) => {
    lightboxImg.src = e.target.src; // Mettre l'image cliquée dans la lightbox
    lightboxImg.alt = e.target.alt;

    resetZoom(); // Réinitialiser tout zoom/déplacement
    lightbox.style.display = "flex"; // Afficher la lightbox
    lightbox.style.cursor = "zoom-in"; // Définir le curseur
  });
});

// Fonction pour réinitialiser le zoom et la position de l'image
const resetZoom = () => {
  isZoomed = false;
  isDragging = false;
  lightboxImg.classList.remove("zoomed");
  lightboxImg.style.transform = "none";
  initialX = initialY = 0;
};

// Ferme la lightbox et réinitialise tout
const closeLightBox = () => {
  lightbox.style.display = "none";
  resetZoom();
};

// Fermer la lightbox lorsqu'on clique sur la croix
closeBtn.addEventListener("click", closeLightBox);

// Fermer la lightbox si on clique sur le fond (et pas l'image)
lightbox.addEventListener("click", (e) => {
  if (e.target === lightbox) closeLightBox();
});

// Fermer la lightbox avec la touche Échap
window.addEventListener("keydown", (e) => {
  if (e.key === "Escape") closeLightBox();
});

// Clic sur l'image : zoom ou dézoom (sauf si on a draggé)
lightboxImg.addEventListener("click", () => {
  if (hasDragged) return; // Ne pas zoomer si on vient de drag

  isZoomed = !isZoomed;

  if (isZoomed) {
    lightboxImg.classList.add("zoomed");
    lightboxImg.style.transform = `scale(2)`; // Applique le zoom
    lightbox.style.cursor = "zoom-out";
    initialX = initialY = 0;
  } else {
    resetZoom();
    lightbox.style.cursor = "zoom-in";
  }
});

// Démarrage du drag : clic maintenu sur l'image
lightboxImg.addEventListener("mousedown", (e) => {
  if (!isZoomed) return; // On ne peut drag que si l'image est zoomée

  isDragging = true;
  canDrag = true;
  hasDragged = false;

  // Calcul des décalages initiaux
  startX = e.clientX - initialX;
  startY = e.clientY - initialY;

  lightbox.style.cursor = "grabbing";
  e.preventDefault(); // Évite le comportement par défaut (ex: sélection)
});

// Fin du drag : relâchement du clic
window.addEventListener("mouseup", () => {
  if (isDragging) {
    // Permet d'ignorer le clic immédiatement après un drag
    setTimeout(() => (hasDragged = false), 0);

    isDragging = false;
    canDrag = false;

    // Rétablir le bon curseur
    lightbox.style.cursor = isZoomed ? "zoom-out" : "zoom-in";
  }
});

// Gère l'affichage du curseur à l'entrée de l'image
lightboxImg.addEventListener("mouseenter", () => {
  if (isZoomed && !isDragging) lightbox.style.cursor = "zoom-out";
});

// // Dézoomer sur double-clic
// lightboxImg.addEventListener("dblclick", () => {
//   resetZoom();
//   lightbox.style.cursor = "zoom-in";
// });

// Rétablit le curseur à la sortie de l'image
lightboxImg.addEventListener("mouseleave", () => {
  if (!isDragging) lightbox.style.cursor = isZoomed ? "zoom-out" : "zoom-in";
});

window.addEventListener("mousemove", (e) => {
  if (!isDragging || !canDrag) return;

  hasDragged = true;

  // Calcul du déplacement
  let newX = (e.clientX - startX) * dragSpeed;
  let newY = (e.clientY - startY) * dragSpeed;

  // Taille visible du conteneur
  const containerWidth = lightbox.clientWidth;
  const containerHeight = lightbox.clientHeight;

  // Taille réelle de l'image (après zoom)
  const imgWidth = lightboxImg.naturalWidth * zoomLevel;
  const imgHeight = lightboxImg.naturalHeight * zoomLevel;

  // Taille visible de l'image (dans le viewport)
  const visibleWidth = Math.min(imgWidth, containerWidth * zoomLevel);
  const visibleHeight = Math.min(imgHeight, containerHeight * zoomLevel);

  // Calcul des limites max de déplacement
  const maxX = (visibleWidth - containerWidth) / 2;
  const maxY = (visibleHeight - containerHeight) / 2;

  // Clamp : empêche de sortir de la zone visible
  newX = Math.max(-maxX, Math.min(maxX, newX));
  newY = Math.max(-maxY, Math.min(maxY, newY));

  // Stocker les nouvelles positions
  initialX = newX;
  initialY = newY;

  // Appliquer la transformation avec limites
  lightboxImg.style.transform = `translate(${initialX}px, ${initialY}px) scale(${zoomLevel})`;
});

// Zoom à la molette de la souris
lightbox.addEventListener(
  "wheel",
  (e) => {
    e.preventDefault();

    const zoomFactor = 0.1;
    let newZoom = zoomLevel + (e.deltaY < 0 ? zoomFactor : -zoomFactor);

    // Limite du zoom
    newZoom = Math.max(1, Math.min(5, newZoom));
    zoomLevel = newZoom;

    isZoomed = zoomLevel > 1;

    // Réinitialiser le déplacement si on dézoome totalement
    if (!isZoomed) {
      resetZoom();
      lightbox.style.cursor = "zoom-in";
      return;
    }

    lightboxImg.classList.add("zoomed");
    lightboxImg.style.transform = `translate(${initialX}px, ${initialY}px) scale(${zoomLevel})`;
    lightbox.style.cursor = "zoom-out";
  },
  { passive: false }
);

let touchStartDist = 0;
let lastTouchZoom = 1;

lightboxImg.addEventListener("touchstart", (e) => {
  if (e.touches.length === 2) {
    // Pinch start
    const dx = e.touches[0].clientX - e.touches[1].clientX;
    const dy = e.touches[0].clientY - e.touches[1].clientY;
    touchStartDist = Math.sqrt(dx * dx + dy * dy);
    lastTouchZoom = zoomLevel;
  } else if (e.touches.length === 1 && isZoomed) {
    canDrag = true;
    startX = e.touches[0].clientX - initialX;
    startY = e.touches[0].clientY - initialY;
  }
});

lightboxImg.addEventListener(
  "touchmove",
  (e) => {
    if (e.touches.length === 2) {
      // Pinch zoom
      const dx = e.touches[0].clientX - e.touches[1].clientX;
      const dy = e.touches[0].clientY - e.touches[1].clientY;
      const dist = Math.sqrt(dx * dx + dy * dy);
      const scale = dist / touchStartDist;

      zoomLevel = Math.min(5, Math.max(1, lastTouchZoom * scale));
      isZoomed = zoomLevel > 1;

      if (!isZoomed) {
        resetZoom();
        return;
      }

      lightboxImg.classList.add("zoomed");
      lightboxImg.style.transform = `translate(${initialX}px, ${initialY}px) scale(${zoomLevel})`;
      e.preventDefault();
    }

    if (e.touches.length === 1 && canDrag && isZoomed) {
      const x = e.touches[0].clientX;
      const y = e.touches[0].clientY;

      let newX = (x - startX) * dragSpeed;
      let newY = (y - startY) * dragSpeed;

      const containerWidth = lightbox.clientWidth;
      const containerHeight = lightbox.clientHeight;
      const imgWidth = lightboxImg.naturalWidth * zoomLevel;
      const imgHeight = lightboxImg.naturalHeight * zoomLevel;
      const maxX = (imgWidth - containerWidth) / 2;
      const maxY = (imgHeight - containerHeight) / 2;

      newX = Math.max(-maxX, Math.min(maxX, newX));
      newY = Math.max(-maxY, Math.min(maxY, newY));

      initialX = newX;
      initialY = newY;

      lightboxImg.style.transform = `translate(${initialX}px, ${initialY}px) scale(${zoomLevel})`;
      e.preventDefault();
    }
  },
  { passive: false }
);

lightboxImg.addEventListener("touchend", () => {
  canDrag = false;
});
