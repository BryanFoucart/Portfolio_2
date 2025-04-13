<?php
require_once __DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$MAIL = $_ENV["MAIL"] ?? "email@example.com";
$TEL = $_ENV["TEL"] ?? "+33754584454";
$MAPS = $_ENV["MAPS"] ?? "PARIS,FR";
$ADRESSE = $_ENV["ADRESSE"] ?? "Google Maps Adresse";
$IDENTITE = $_ENV["IDENTITE"] ?? "Pierre Dupont";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Portfolio de <?php echo htmlspecialchars($IDENTITE); ?>, développeur web junior" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="icon" type="image/png" href="/assets/favicons/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="/assets/favicons/favicon.svg" />
  <link rel="shortcut icon" href="/assets/favicons/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicons/apple-touch-icon.png" />
  <meta name="apple-mobile-web-app-title" content="MyWebSite" />
  <link rel="manifest" href="/assets/favicons/site.webmanifest" />
  <link rel="stylesheet" href="./assets/styles/style.css" />
  <script type="module" src="./script.js"></script>

  <title><?php echo htmlspecialchars($IDENTITE); ?> - Portfolio WebDev</title>
</head>

<body>
  <header>
    <nav class="navbar">
      <ul>
        <li>
          <a href="#Accueil"><i class="fas fa-home" title="Accueil">
              <span class="text"> Accueil</span></i></a>
        </li>
        <li>
          <a href="#A_propos" title="A Propos"><i class="fas fa-user"><span class="text"> A propos</span></i></a>
        </li>
        <li>
          <a href="#Competences"><i class="fas fa-code" title="Compétences"><span class="text"> Compétences</span></i></a>
        </li>
        <li>
          <a href="#Projets"><i class="fas fa-briefcase" title="Projets"><span class="text"> Projets</span></i></a>
        </li>
        <li>
          <a href="#Contact"><i class="fas fa-envelope" title="Contact"><span class="text"> Contact</span></i></a>
        </li>
      </ul>
    </nav>
  </header>
  <main>
    <section id="Accueil">
      <div id="hero">
        <h1>
          <?php echo htmlspecialchars($IDENTITE); ?>
        </h1>
        <img src="./assets/images/Sans titre-1.webp" alt="<?php echo htmlspecialchars($IDENTITE); ?>" />
        <h2>Développeur Web</h2>
      </div>
      <div id="bienvenue">
        <h2>Bienvenue sur mon portfolio !</h2>
        <div class="button">
          <a href="#A_propos"><button>En savoir plus</button></a>
          <a href="./assets/Curriculum_Vitae.pdf" download="CV_<?php echo htmlspecialchars($IDENTITE); ?>"><button>Télécharger mon CV</button></a>
        </div>
      </div>
    </section>
    <section id="A_propos">
      <h2>A propos de moi</h2>
      <hr>
      <div id="container-A_propos">
        <div id="a_propos_left">
          <img src="./assets/images/Sans titre-1.webp" alt="<?php echo htmlspecialchars($IDENTITE); ?>" />
          <p>
            Je m'appelle <?php echo htmlspecialchars($IDENTITE); ?> et je suis développeur web junior. Je suis passionné par le développement web et je suis actuellement en formation chez l'AFCI d'Arras. Je suis à la recherche d'une entreprise pour débuter ma carrière.
          </p>
        </div>
        <div id="a_propos_right">
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
            <a href="./assets/Curriculum_Vitae.pdf" download="CV_<?php echo htmlspecialchars($IDENTITE); ?>"><button>Télécharger mon CV</button></a>
          </div>
        </div>
      </div>
    </section>
    <section id="Competences">
      <h2>Compétences</h2>
      <hr>
      <div id="competences_container">
        <div class="colonne_competences">

          <div id="competences_langages">
            <h3 class="titre_section">LANGAGES</h3>
            <ul>
              <li>
                <div class="text-left">html<span class="right">75%</span></div><span class="bar"><span data-skill="skill_html"></span></span> <!-- skill bar 1 -->
              </li>

              <li>
                <div class="text-left">css<span class="right">65%</span></div><span class="bar"><span data-skill="skill_css"></span></span><!-- skill bar 2 -->
              </li>

              <li>
                <div class="text-left">javascript<span class="right">40%</span></div><span class="bar"><span data-skill="skill_js"></span></span><!-- skill bar 3 -->
              </li>

              <li>
                <div class="text-left">php<span class="right">25%</span></div><span class="bar"><span data-skill="skill_php"></span></span><!-- skill bar 4 -->
              </li>
            </ul>
          </div>
          <div id="competences_logiciels">
            <h3 class="titre_section">LOGICIELS</h3>
            <ul>
              <li>
                <div class="text-left">figma<span class="right">15%</span></div><span class="bar"><span data-skill="logiciel_figma"></span></span> <!-- skill bar 1 -->
              </li>

              <li>
                <div class="text-left">photoshop<span class="right">45%</span></div><span class="bar"><span data-skill="logiciel_photoshop"></span></span><!-- skill bar 2 -->
              </li>

              <li>
                <div class="text-left">illustrator<span class="right">20%</span></div><span class="bar"><span data-skill="logiciel_illustrator"></span></span><!-- skill bar 3 -->
              </li>

              <li>
                <div class="text-left">docker<span class="right">25%</span></div><span class="bar"><span data-skill="logiciel_docker"></span></span><!-- skill bar 4 -->
              </li>
            </ul>
          </div>
        </div>
        <div class="colonne_competences">
          <div id="competences_frameworks">
            <h3 class="titre_section">FRAMEWORKS</h3>
            <ul>
              <li>
                <div class="text-left">bootstrap<span class="right">5%</span></div><span class="bar"><span data-skill="framework_bootstrap"></span></span>
              </li>

              <li>
                <div class="text-left">tailwind<span class="right">10%</span></div><span class="bar"><span data-skill="framework_tailwind"></span></span>
              </li>

              <li>
                <div class="text-left">react<span class="right">2%</span></div><span class="bar"><span data-skill="framework_react"></span></span>
              </li>

              <li>
                <div class="text-left">symfony<span class="right">1%</span></div><span class="bar"><span data-skill="framework_symfoni"></span></span>
              </li>
            </ul>
          </div>
          <div id="competences_autres">
            <h3 class="titre_section">AUTRES</h3>
            <ul>
              <li>
                <div class="text-left">anglais<span class="right">45%</span></div><span class="bar"><span data-skill="autre_anglais"></span></span>
              </li>

              <li>
                <div class="text-left">github<span class="right">40%</span></div><span class="bar"><span data-skill="autre_github"></span></span>
              </li>

              <li>
                <div class="text-left">postman<span class="right">15%</span></div><span class="bar"><span data-skill="autre_postman"></span></span>
              </li>

              <li>
                <div class="text-left">visual studio code<span class="right">40%</span></div><span class="bar"><span data-skill="autre_visual_studio_code"></span></span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="Projets">
      <h2>Projets</h2>
      <hr>
    </section>
    <section id="Contact">

      <h2>Contact</h2>
      <hr>
      <div id="contact_container">
        <div id="Formulaire">
          <h3>Formulaire de contact</h3>
          <form id="contactForm" action="send.php" method="POST">
            <label for="name">Nom :</label>
            <input type="text" name="name" required>

            <label for="email">Email :</label>
            <input type="email" name="email" required>

            <label for="subject">Sujet :</label>
            <input type="text" name="subject" required>

            <label for="message">Message :</label>
            <textarea name="message" rows="5" cols="30" required></textarea>

            <button type="submit">Envoyer</button>
          </form>
          <div id="Response_Message"></div>
        </div>

        <div id="Informations">
          <ul>
            <li><i class="fas fa-map-location-dot"></i><span><?php echo htmlspecialchars($MAPS); ?></span></li>
            <li><i class="fas fa-mobile-screen"></i><span> <?php echo htmlspecialchars($TEL); ?></span></li>
            <li>
              <i class="fas fa-at"></i><span><?php echo htmlspecialchars($MAIL); ?></span>
            </li>
          </ul>
          <iframe src="<?php echo htmlspecialchars($ADRESSE); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </section>
  </main>
  <footer id="footer">
    <div id="copyright"><i class="fa-regular fa-copyright"></i><span>Portfolio - <?php echo htmlspecialchars($IDENTITE); ?></span></div>
    <ul id="reseaux">
      <li><a href="https://fr-fr.facebook.com/" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
      <li><a href="https://fr.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
      <li><a href="https://github.com/" target="_blank"><i class="fab fa-github-square"></i></a></li>
      <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram-square"></i></a></li>
      <li><a href="https://x.com/?lang=fr" target="_blank"><i class="fa-brands fa-square-x-twitter"></i></a></li>
    </ul>
  </footer>
</body>

</html>