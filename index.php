<?php
/*
 * PORTFOLIO DE FIFALIANA
 * Ce fichier PHP construit la page et traite le formulaire.
 * Le formulaire affiche une confirmation, mais n'envoie pas encore d'e-mail.
 */
$nom = "Fifaliana";
$titre = "Étudiant en informatique · Développeur web en formation";
$messageConfirmation = "";
$erreur = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données envoyées par le formulaire.
    $nomVisiteur = trim($_POST["nom"] ?? "");
    $emailVisiteur = trim($_POST["email"] ?? "");
    $messageVisiteur = trim($_POST["message"] ?? "");

    // Vérifier les champs avant d'afficher la confirmation.
    if ($nomVisiteur === "" || !filter_var($emailVisiteur, FILTER_VALIDATE_EMAIL) || $messageVisiteur === "") {
        $erreur = "Vérifie ton nom, ton adresse e-mail et ton message.";
    } else {
        // htmlspecialchars protège l'affichage contre l'insertion de code HTML.
        $nomSecurise = htmlspecialchars($nomVisiteur, ENT_QUOTES, "UTF-8");
        $messageConfirmation = "Merci " . $nomSecurise . " ! Ton message a bien été reçu par cette démonstration.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio de Fifaliana, étudiant en informatique passionné par le développement web et la création numérique.">
    <meta name="theme-color" content="#11120f">
    <title>Fifaliana — Portfolio créatif</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
<a class="skip-link" href="#contenu">Aller au contenu</a>
<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="#accueil" aria-label="Fifaliana, accueil">F<span>.</span></a>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="navigation" aria-label="Ouvrir le menu">
            <span></span><span></span>
        </button>
        <nav class="main-nav" id="navigation" aria-label="Navigation principale">
            <a href="#apropos">À propos</a>
            <a href="#competences">Compétences</a>
            <a href="#projets">Projets</a>
            <a href="#contact">Contact</a>
        </nav>
        <a class="nav-cta" href="#contact">Parlons ensemble <span aria-hidden="true">↗</span></a>
    </div>
</header>

<main id="contenu">
    <section class="hero section-shell" id="accueil">
        <div class="container hero-grid">
            <div class="hero-copy reveal">
                <p class="eyebrow"><span class="eyebrow-dot"></span> PORTFOLIO PERSONNEL · MADAGASCAR</p>
                <h1>Je transforme<br>les idées en <em>expériences</em><br>numériques.</h1>
                <p class="hero-intro">Bonjour, je suis <strong><?= htmlspecialchars($nom, ENT_QUOTES, "UTF-8") ?></strong>, étudiant en informatique et développeur web en formation. J'aime concevoir des interfaces utiles, élégantes et faciles à utiliser.</p>
                <div class="hero-actions">
                    <a class="button button-light" href="#projets">Découvrir mes projets <span aria-hidden="true">↘</span></a>
                    <a class="text-link" href="#apropos">En savoir plus <span aria-hidden="true">↗</span></a>
                </div>
                <div class="hero-meta">
                    <span class="availability"><span></span> Ouvert à l'apprentissage</span>
                    <span class="meta-divider"></span>
                    <span>Antsirabe, Madagascar</span>
                </div>
            </div>
            <div class="hero-art reveal" aria-label="Carte de présentation">
                <div class="art-orbit orbit-one"></div><div class="art-orbit orbit-two"></div>
                <div class="art-sun"></div>
                <div class="art-card">
                    <div class="art-card-top"><span>FIFALIANA / 01</span><span>✳</span></div>
                    <div class="art-monogram">F<span>.</span></div>
                    <div class="art-card-bottom"><span>Curiosité<br>Créativité<br>Progression</span><span class="art-arrow">↗</span></div>
                </div>
                <p class="art-caption">Construire avec intention.</p>
                <span class="floating-index">01 — 04</span>
            </div>
        </div>
        <div class="hero-bottom-line"></div>
    </section>

    <section class="intro-strip">
        <div class="container strip-content"><span>APPRENDRE</span><i></i><span>CONCEVOIR</span><i></i><span>DÉVELOPPER</span><i></i><span>PROGRESSER</span></div>
    </section>

    <section class="section section-light" id="apropos">
        <div class="container two-column">
            <div class="section-heading reveal"><p class="eyebrow dark-eyebrow">01 / À PROPOS</p><h2>Un esprit curieux.<br><em>Une ambition claire.</em></h2></div>
            <div class="about-content reveal">
                <p class="lead">Je construis mes compétences pas à pas, avec l'envie de transformer ce que j'apprends en projets concrets.</p>
                <p>Je m'intéresse au développement web, à la logique de programmation et à la conception d'interfaces. Mon objectif est de créer des expériences numériques qui allient simplicité, performance et beauté.</p>
                <a class="line-link" href="#contact">Faisons connaissance <span>↗</span></a>
            </div>
        </div>
    </section>


    <section class="section skills-section" id="competences">
        <div class="container">
            <div class="section-heading heading-row reveal"><div><p class="eyebrow">02 / SAVOIR-FAIRE</p><h2>Mes outils pour<br><em>créer et apprendre.</em></h2></div><p class="heading-note">Des bases solides aujourd'hui,<br>des projets plus ambitieux demain.</p></div>
            <div class="skills-grid">
                <article class="skill-card reveal"><span class="skill-number">01</span><div class="skill-icon">⌘</div><h3>HTML & CSS</h3><p>Des pages structurées, lisibles et adaptées à tous les écrans.</p><span class="skill-tag">Structure · Design</span></article>
                <article class="skill-card reveal"><span class="skill-number">02</span><div class="skill-icon">{"}"}</div><h3>PHP</h3><p>Comprendre la logique serveur et créer des pages dynamiques.</p><span class="skill-tag">Serveur · Logique</span></article>
                <article class="skill-card reveal"><span class="skill-number">03</span><div class="skill-icon">JS</div><h3>JavaScript</h3><p>Ajouter des interactions utiles et améliorer l'expérience utilisateur.</p><span class="skill-tag">Interaction · UX</span></article>
                <article class="skill-card reveal"><span class="skill-number">04</span><div class="skill-icon">⌁</div><h3>Programmation</h3><p>Développer ma méthode de résolution de problèmes et mon raisonnement.</p><span class="skill-tag">Logique · Progression</span></article>
            </div>
        </div>
    </section>

    <section class="section section-light projects-section" id="projets">
        <div class="container">
            <div class="section-heading heading-row reveal"><div><p class="eyebrow dark-eyebrow">03 / SÉLECTION</p><h2>Des idées qui prennent<br><em>forme.</em></h2></div><p class="heading-note">Quelques concepts pour présenter<br>les domaines que j'explore.</p></div>
            <div class="projects-grid">
                <article class="project-card project-featured reveal">
                    <div class="project-visual visual-portfolio"><div class="mini-browser"><div class="browser-dots"><i></i><i></i><i></i></div><div class="mini-layout"><span class="mini-kicker">HELLO, WORLD</span><b>Designing<br>the next idea.</b><span class="mini-pill"></span></div></div></div>
                    <div class="project-info"><div><p class="project-type">01 / DESIGN WEB</p><h3>Portfolio personnel</h3></div><span class="project-arrow">↗</span><p>Une présence en ligne claire pour présenter mon profil, mes apprentissages et mes futurs projets.</p><div class="project-tags"><span>PHP</span><span>CSS</span><span>JavaScript</span></div></div>
                </article>
                <article class="project-card reveal">
                    <div class="project-visual visual-dashboard"><div class="dash-window"><div class="dash-side"></div><div class="dash-content"><i></i><i></i><div class="dash-chart"><b></b><b></b><b></b><b></b><b></b><b></b></div><i></i></div></div></div>
                    <div class="project-info"><div><p class="project-type">02 / APPLICATION</p><h3>Tableau de bord</h3></div><span class="project-arrow">↗</span><p>Concept d'interface pour organiser des informations et suivre des données.</p><div class="project-tags"><span>UI</span><span>Responsive</span></div></div>
                </article>
                <article class="project-card reveal">
                    <div class="project-visual visual-code"><div class="code-window"><div class="code-top"><i></i><i></i><i></i><span>main.php</span></div><div class="code-lines"><b></b><b></b><b></b><b></b><b></b><b></b><b></b></div><div class="code-stamp">BUILD<br>LEARN<br>REPEAT<span>↗</span></div></div></div>
                    <div class="project-info"><div><p class="project-type">03 / APPRENTISSAGE</p><h3>Exercices de programmation</h3></div><span class="project-arrow">↗</span><p>Des petits exercices pour pratiquer la logique, les variables, les conditions et les fonctions.</p><div class="project-tags"><span>PHP</span><span>Java</span><span>C#</span></div></div>
                </article>
            </div>
            <p class="project-disclaimer">Note : ces projets sont des concepts de présentation. Remplace-les par tes réalisations réelles au fur et à mesure.</p>
        </div>
    </section>

    <section class="quote-section">
        <div class="container quote-inner reveal"><span class="quote-mark">“</span><blockquote>Le progrès vient de ce que l'on apprend, pratique et améliore chaque jour.</blockquote><p>UNE ÉTAPE À LA FOIS · FIFALIANA</p></div>
    </section>

    <section class="section contact-section" id="contact">
        <div class="container contact-grid">
            <div class="contact-copy reveal"><p class="eyebrow">04 / CONTACT</p><h2>Une idée en tête ?<br><em>Parlons-en.</em></h2><p>Une question, un conseil ou une occasion d'apprendre ensemble ? Tu peux m'écrire à l'aide du formulaire.</p><div class="contact-detail"><span class="detail-symbol">↗</span><div><small>LOCALISATION</small><strong>Antsirabe, Madagascar</strong></div></div><div class="contact-detail"><span class="detail-symbol">@</span><div><small>DISPONIBILITÉ</small><strong>Ouvert aux échanges et collaborations d'apprentissage</strong></div></div></div>
            <div class="contact-form-wrap reveal">
                <?php if ($messageConfirmation !== ""): ?><p class="form-alert success" role="status"><?= $messageConfirmation ?></p><?php endif; ?>
                <?php if ($erreur !== ""): ?><p class="form-alert error" role="alert"><?= htmlspecialchars($erreur, ENT_QUOTES, "UTF-8") ?></p><?php endif; ?>
                <form class="contact-form" method="POST" action="#contact">
                    <div class="field-row"><div class="field"><label for="nom">Ton nom</label><input id="nom" name="nom" type="text" placeholder="Ex. Rakoto" autocomplete="name" required></div><div class="field"><label for="email">Ton e-mail</label><input id="email" name="email" type="email" placeholder="toi@exemple.com" autocomplete="email" required></div></div>
                    <div class="field"><label for="message">Ton message</label><textarea id="message" name="message" rows="5" placeholder="Bonjour Fifaliana..." required></textarea></div>
                    <button class="button button-accent" type="submit">Envoyer le message <span aria-hidden="true">↗</span></button>
                    <p class="form-note">Démo : le formulaire affiche une confirmation, mais n'envoie pas encore de véritable e-mail.</p>
                </form>
            </div>
        </div>
    </section>
</main>

<footer class="site-footer"><div class="container footer-inner"><a class="brand footer-brand" href="#accueil">F<span>.</span></a><p>Conçu avec soin par Fifaliana.</p><a href="#accueil" class="back-top">Retour en haut ↑</a><small>© <?= date("Y") ?> · Tous droits réservés</small></div></footer>
</body>
</html>
