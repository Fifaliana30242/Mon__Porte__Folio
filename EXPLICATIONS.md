# Explication simple du projet Portfolio Luxe

## 1. `index.php` — la page et le PHP

### Les variables
```php
$nom = "Fifaliana";
$titre = "Étudiant en informatique · Développeur web en formation";
$messageConfirmation = "";
$erreur = "";
```
Les variables gardent des informations réutilisées dans la page. Pour changer le nom affiché, modifie `$nom`.

### Détecter l'envoi du formulaire
```php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Le formulaire a été envoyé.
}
```
`$_SERVER["REQUEST_METHOD"]` indique la méthode de la requête. `POST` est utilisée lorsque le visiteur envoie le formulaire.

### Récupérer les champs
```php
$nomVisiteur = trim($_POST["nom"] ?? "");
$emailVisiteur = trim($_POST["email"] ?? "");
$messageVisiteur = trim($_POST["message"] ?? "");
```
`$_POST` contient les valeurs envoyées par les champs qui possèdent un attribut `name`. `trim()` retire les espaces au début et à la fin. `?? ""` fournit une chaîne vide si le champ n'existe pas.

### Vérifier l'adresse e-mail
```php
filter_var($emailVisiteur, FILTER_VALIDATE_EMAIL)
```
Cette fonction vérifie que l'adresse ressemble à une adresse e-mail valide. La vérification côté PHP est importante même si le formulaire possède `required` et `type="email"`.

### Afficher le nom en sécurité
```php
htmlspecialchars($nom, ENT_QUOTES, "UTF-8")
```
Cette fonction empêche le navigateur d'interpréter le texte saisi comme du code HTML. Elle est utile lorsque des données d'un visiteur sont réaffichées.

### Afficher la date actuelle
```php
<?= date("Y") ?>
```
`date("Y")` renvoie l'année actuelle. `<?= ... ?>` est une forme courte de `echo`.

### Relier CSS et JavaScript
```html
<link rel="stylesheet" href="style.css">
<script src="script.js" defer></script>
```
Le navigateur charge le fichier CSS pour le style et le fichier JavaScript pour les interactions. `defer` attend que le document soit analysé avant d'exécuter le script.

### Le formulaire
```html
<form method="POST" action="#contact">
```
`method="POST"` envoie les champs au serveur. `action="#contact"` revient à la section Contact après l'envoi. L'attribut `required` demande au navigateur de ne pas laisser le champ vide.

**Limite actuelle :** le formulaire affiche une confirmation, mais ne transmet pas le message à une boîte e-mail. Pour cela, il faudra configurer l'envoi côté serveur.

## 2. `style.css` — le design

### Variables CSS
```css
:root {
  --ink: #171914;
  --paper: #f4f2ec;
  --accent: #d9fa79;
}
```
Les variables définissent les couleurs réutilisables. Pour changer la couleur vive du site, modifie `--accent`.

### Réinitialiser les dimensions
```css
* { box-sizing: border-box; }
```
La largeur et la hauteur incluent les bordures et le remplissage, ce qui rend les calculs de dimensions plus faciles.

### Centrer le contenu
```css
.container {
  width: min(1160px, calc(100% - 64px));
  margin-inline: auto;
}
```
Le contenu ne dépasse pas 1160 pixels sur grand écran et conserve une marge sur les petits écrans. `margin-inline: auto` le centre horizontalement.

### Disposition avec Grid
```css
.hero-grid {
  display: grid;
  grid-template-columns: 1.18fr .82fr;
}
```
CSS Grid divise l'accueil en deux colonnes : le texte et la carte visuelle. Les fractions `fr` répartissent l'espace disponible.

### Espacement et couleurs
`padding` ajoute de l'espace à l'intérieur d'un élément ; `margin` ajoute de l'espace autour. `background` définit l'arrière-plan. `border-radius` arrondit les angles.

### Effets au survol
```css
.skill-card:hover {
  background: #272a21;
}
```
`:hover` applique un style quand la souris passe sur la carte. Sur téléphone, le site reste utilisable sans survol.

### Responsive
```css
@media (max-width: 680px) {
  .hero-grid { grid-template-columns: 1fr; }
}
```
Quand l'écran fait 680 pixels de large ou moins, les colonnes deviennent une seule colonne. D'autres règles réduisent les espacements, transforment le menu en menu mobile et empilent les champs du formulaire.

### Réduire les animations
```css
@media (prefers-reduced-motion: reduce) { ... }
```
Cette règle respecte la préférence système des personnes qui souhaitent moins d'animations.

## 3. `script.js` — les interactions

### Attendre le chargement du document
```javascript
document.addEventListener("DOMContentLoaded", () => {
  // Le HTML est prêt.
});
```
Le code s'exécute quand le document HTML a été analysé.

### Sélectionner un élément
```javascript
const menuButton = document.querySelector(".menu-toggle");
```
`querySelector` recherche le premier élément qui correspond au sélecteur CSS `.menu-toggle`.

### Ouvrir et fermer le menu
```javascript
const ouvert = navigation.classList.toggle("open");
```
`classList.toggle()` ajoute la classe `open` si elle n'existe pas et la retire si elle existe. Le CSS utilise cette classe pour afficher ou masquer le menu.

### Mettre à jour l'accessibilité
```javascript
menuButton.setAttribute("aria-expanded", String(ouvert));
```
Cette propriété indique aux technologies d'assistance si le menu est ouvert (`true`) ou fermé (`false`).

### Détecter le défilement
`IntersectionObserver` détecte quand une section entre dans la zone visible. Le script ajoute alors la classe `visible`, que le CSS utilise pour faire apparaître doucement l'élément.

### Vérifier le formulaire
```javascript
if (!formulaire.checkValidity()) {
  evenement.preventDefault();
  formulaire.reportValidity();
}
```
Le navigateur vérifie les champs. `preventDefault()` annule l'action normale seulement si les champs ne sont pas valides. La vérification PHP reste nécessaire.

## 4. Structure du projet

```text
Portfolio_Luxe_Fifaliana/
├── index.php
├── style.css
├── script.js
├── LISEZ-MOI.txt
└── EXPLICATIONS.md
```
Tous ces fichiers doivent rester dans le même dossier pour que les liens vers `style.css` et `script.js` fonctionnent.

## 5. Comment progresser
1. Change le nom et les textes dans `index.php`.
2. Change `--accent` dans `style.css` pour tester une autre couleur.
3. Ajoute un vrai projet dans la section Projets.
4. Essaie le site en réduisant la largeur de la fenêtre.
5. Apprends ensuite à enregistrer les messages dans une base de données ou à envoyer un e-mail de manière sécurisée.
