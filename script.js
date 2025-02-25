// Sélectionner la barre de navigation et la section#Accueil
const navbar = document.querySelector('.navbar'); // Sélectionne le nav avec la classe .navbar
const accueilSection = document.getElementById('Accueil'); // Sélectionne la section#Accueil

// Fonction pour ajuster le padding de la section#Accueil
function adjustSectionPadding() {
  // Obtenir la hauteur de la barre de navigation
  const navbarHeight = navbar.offsetHeight;

  // Appliquer un padding-top à la section#Accueil pour éviter que le contenu ne soit caché
  accueilSection.style.paddingTop = `${navbarHeight}px`;
}

// Appeler la fonction pour ajuster le padding lors du chargement de la page
adjustSectionPadding();

// Ajouter un événement pour ajuster le padding lorsque la taille de la fenêtre change
window.addEventListener('resize', () => {
  // Mettre à jour le padding-top à chaque redimensionnement de la fenêtre
  adjustSectionPadding();
});
