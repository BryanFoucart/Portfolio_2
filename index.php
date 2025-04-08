<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./reset.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="./style.css" />
  <script type="module" src="./script.js"></script>
  <title>Mon Portfolio</title>
</head>

<body>
  <header>
    <nav class="navbar">
      <ul>
        <li>
          <a href="#"><i class="fa fa-home" title="Accueil">
              <span class="text"> Accueil</span></i></a>
        </li>
        <li>
          <a href="#A_propos" title="A Propos"><i class="fa fa-user"><span class="text"> A propos</span></i></a>
        </li>
        <li>
          <a href="#Competences"><i class="fa fa-code" title="Compétences"><span class="text"> Compétences</span></i></a>
        </li>
        <li>
          <a href="#Projets"><i class="fa fa-briefcase" title="Projets"><span class="text"> Projets</span></i></a>
        </li>
        <li>
          <a href="#Contact"><i class="fa fa-envelope" title="Contact"><span class="text"> Contact</span></i></a>
        </li>
      </ul>
    </nav>
  </header>
  <main>
    <section id="Accueil">
      <div id="hero">
        <h1>
          Bryan Foucart
        </h1>
        <img src="./Sans titre-1.jpg" alt="Bryan Foucart" />
        <h2>Développeur Web</h2>
      </div>
      <div id="bienvenue">
        <h2>Bienvenue sur mon portfolio !</h2>
        <div class="button">
          <a href="#A_propos"><button>En savoir plus</button></a>
          <a href="./Curriculum_Vitae_Bryan_Foucart.pdf" download="CV_Bryan_Foucart.pdf"><button>Télécharger mon CV</button></a>
        </div>
      </div>
    </section>
    <section id="A_propos">
      <h2>A propos</h2>
      <div id="container-A_propos">
        <div id="apropos">
          <img src="./Sans titre-1.jpg" alt="Bryan Foucart" />
          <p>
            Je m'appelle Bryan Foucart et je suis développeur web junior. Je suis passionné par le développement web et je suis actuellement en formation chez l'AFCI d'Arras. Je suis à la recherche d'une entreprise pour débuter ma carrière.
          </p>
        </div>
        <div id="apropos2">
          <h3>Mes diplômes</h3>
          <ul id="diplomes">
            <li>2025 - Titre Professionnel Développeur Web et Web Mobile</li>
            <li>2023 - Titre Professionnel Technicien d'Assistance en Informatique</li>
            <li>2020 - Licence de Psychologie</li>
          </ul>
          <h3>Mes hobbies</h3>
          <ul id="hobbies">
            <li>Jeux vidéo</li>
            <li>Lecture</li>
            <li>Informatique</li>
            <li>Voyages</li>
            <li>Musique</li>
          </ul>
          <h3>Mes valeurs</h3>
          <ul id="valeurs">
            <li>Passionné</li>
            <li>Curieux</li>
            <li>Autonome</li>
            <li>Créatif</li>
            <li>Rigoureux</li>
          </ul>
          <div class="button">

            <a href="#Competences"><button>Mes compétences</button></a>
            <a href="./Curriculum_Vitae_Bryan_Foucart.pdf" download="CV_Bryan_Foucart.pdf"><button>Télécharger mon CV</button></a>
          </div>
        </div>
      </div>
    </section>
    <section id="Competences">
      <p>Compétences</p>
    </section>
    <section id="Projets">
      <p>Projets</p>
    </section>
    <section id="Contact">
      <p>Contact</p>
    </section>
  </main>
</body>

</html>