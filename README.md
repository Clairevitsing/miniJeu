# miniJeu
PHP and POO
Exercice de Développement d'un Mini-Jeu de Combat avec Montée en Niveau
Objectif : Créer un mini-jeu de combat en PHP en utilisant les classes Hero, Warrior,
et Mage, avec une logique de montée en niveau et de stockage des informations de
niveau dans les cookies.

Instructions

Développement des Classes de Base :
● Développez une classe de base Hero avec des propriétés pour le nom,
la force de base (baseStrength), la santé de base (baseHealth), la
défense et le niveau. Ajoutez également des méthodes pour augmenter
le niveau (levelUp) et mettre à jour les statistiques (updateStats).
● Créez des classes dérivées Warrior et Mage avec des valeurs initiales
spécifiques pour leur force, santé et défense.

Création de l'Interface Utilisateur :
● Développez une interface utilisateur simple en HTML pour permettre
aux joueurs de choisir un héros (Warrior ou Mage) et un adversaire.

● Utilisez un formulaire HTML pour soumettre les choix des joueurs à un
script PHP.

Implémentation de la Logique de Combat :
● Dans un script PHP (combat.php), créez la logique de combat en
utilisant les instances des classes Hero, Warrior, et Mage.
● Le combat doit se dérouler en tours, avec des attaques aléatoires et les
dégâts reçus diminués par la défense du héros.
● Affichez les détails de chaque tour, y compris qui attaque, qui subit des
dégâts, et les points de vie restants.

Gestion de la Montée en Niveau et des Cookies :● Implémentez une fonctionnalité pour que les héros montent de niveau
après chaque victoire.
● Stockez le niveau actuel du héros dans un cookie. Lors du chargement
du jeu, vérifiez si un cookie de niveau existe et initialisez le héros avec
ce niveau.

Affichage des Résultats du Combat :● À la fin du combat, affichez qui a gagné et indiquez si le héros a monté
de niveau.
