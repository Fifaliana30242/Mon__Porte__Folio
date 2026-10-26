/* ==========================================================
   PORTFOLIO LUXE — JavaScript
   1. Menu mobile accessible
   2. Apparition progressive des éléments
   3. Mise en évidence du lien de navigation actif
   ========================================================== */
document.addEventListener("DOMContentLoaded", () => {
  const menuButton = document.querySelector(".menu-toggle");
  const navigation = document.querySelector(".main-nav");
  const navLinks = navigation ? navigation.querySelectorAll("a") : [];

  // Ouvrir ou fermer le menu sur les petits écrans.
  if (menuButton && navigation) {
    menuButton.addEventListener("click", () => {
      const ouvert = navigation.classList.toggle("open");
      menuButton.setAttribute("aria-expanded", String(ouvert));
      menuButton.setAttribute("aria-label", ouvert ? "Fermer le menu" : "Ouvrir le menu");
      document.body.classList.toggle("menu-open", ouvert);
    });

    // Quand on clique sur un lien, refermer le menu mobile.
    navLinks.forEach(lien => {
      lien.addEventListener("click", () => {
        navigation.classList.remove("open");
        menuButton.setAttribute("aria-expanded", "false");
        document.body.classList.remove("menu-open");
      });
    });

    // La touche Échap permet de fermer le menu.
    document.addEventListener("keydown", evenement => {
      if (evenement.key === "Escape") {
        navigation.classList.remove("open");
        menuButton.setAttribute("aria-expanded", "false");
        document.body.classList.remove("menu-open");
      }
    });
  }

  // Faire apparaître certains blocs au défilement.
  const elements = document.querySelectorAll(
    ".hero-copy, .hero-art, .section-heading, .about-content, .skill-card, .project-card, .quote-inner, .contact-copy, .contact-form-wrap"
  );
  elements.forEach(element => element.classList.add("reveal"));

  // IntersectionObserver est efficace et évite de surveiller chaque pixel de scroll.
  if ("IntersectionObserver" in window) {
    const observateur = new IntersectionObserver(entrees => {
      entrees.forEach(entree => {
        if (entree.isIntersecting) {
          entree.target.classList.add("visible");
          observateur.unobserve(entree.target); // Une seule animation par élément.
        }
      });
    }, { threshold: 0.12 });

    elements.forEach(element => observateur.observe(element));
  } else {
    // Solution de secours pour les anciens navigateurs.
    elements.forEach(element => element.classList.add("visible"));
  }

  // Souligner dans le menu le lien correspondant à la section visible.
  const sections = document.querySelectorAll("main section[id]");
  if ("IntersectionObserver" in window) {
    const observateurSections = new IntersectionObserver(entrees => {
      entrees.forEach(entree => {
        if (!entree.isIntersecting) return;
        navLinks.forEach(lien => {
          const actif = lien.getAttribute("href") === `#${entree.target.id}`;
          lien.classList.toggle("active", actif);
        });
      });
    }, { rootMargin: "-35% 0px -55% 0px" });

    sections.forEach(section => observateurSections.observe(section));
  }

  // Vérification de base du formulaire côté navigateur.
  // La validation PHP reste nécessaire, car JavaScript peut être désactivé.
  const formulaire = document.querySelector(".contact-form");
  if (formulaire) {
    formulaire.addEventListener("submit", evenement => {
      if (!formulaire.checkValidity()) {
        evenement.preventDefault();
        formulaire.reportValidity();
      }
    });
  }
});
