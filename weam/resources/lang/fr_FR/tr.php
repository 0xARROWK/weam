<?php

// FR

return [

	// Common
    'Weam' => 'Weam',

    // Menu
    'Parameters' => 'Paramètres',
    'Log In' => 'Connexion',
    'Sign Up' => 'Inscription',
    'Log Out' => 'Déconnexion',
    'Current language' => App::getLocale(),
    'Default language' => config("app.fallback_locale"),

    // Log In/Sign Up
    'Username' => 'Nom d\'utilisateur',
    'Enter your username' => 'Entrez votre nom d\'utilisateur',
    'Password' => 'Mot de passe',
    'Password confirmation' => 'Confirmation du mot de passe',
    '************' => '************',
    'Email address' => 'Adresse email',
    'Enter your email address' => 'Entrez votre adresse email',
    'Date of birth' => 'Date de naissance',
    'Day' => 'Jour',
    'Month' => 'Mois',
    'Year' => 'Année',
    'Sorry, this user is not from here' => 'Désolé, cet utilisateur n\'est pas d\'ici.',
    'Too many login attempts' => 'Certaines limites sont faites pour être dépassées... Mais pas celle-ci. Veuillez réessayer dans :seconds secondes.',
    'A verification link has been sent to your email address, if you did not receive the email, you can request another from your profile' => 'Un lien de vérification a été envoyé à votre adresse email. Si vous n\'avez pas reçu de lien, vous pouvez en demander un autre depuis votre profil.',
    'View my profile' => 'Voir mon profil',
    'Continue' => 'Continuer',

    // Signup email verification
    'Weam - Account verification' => 'Weam - Vérification du compte',

    // Home
    'Welcome' => 'Bienvenue à toi :name|Bienvenue à nous :name',

    // Tasks
    'Tasks' => 'Tâches',

    // CSRF and token errors
    'Invalid token' => 'La requête s\'est perdue ! Peut être que son niveau de privilèges n\'était pas assez élevé...',
    'We are unable to retrieve get access token' => 'Nous sommes incapable d\'obtenir votre jeton d\'accès. Par conséquent, certaines requêtes ne posséderont pas le niveau de privilège nécessaire.',
    'Invalid user access token' => 'Jeton d\'accès utilisateur invalide. Afin que nous puissions récupérer vos données correctement, veuillez vous reconnecter.',

    // Other errors
    'An error occured' => 'Une erreur inconnue est survenue. Veuillez réessayer plus tard.',
    'Your data could not be saved' => 'Une interférence intergalactique est survenue : vos données n\'ont pas pu être sauvegardées. Veuillez réessayer plus tard.',
    'Error' => 'Erreur',
    'We are unable to retrieve your data' => 'Nous ne sommes pas en mesure de récupérer vos données. Afin que nous puissions récupérer vos données correctement, veuillez vous connecter à nouveau.',

    // Form validation errors
    'Required' => [
        'username' => 'Le champ "nom d\'utilisateur" n\'a pas été rempli correctement',
        'email' => 'Le champ "adresse email" n\'a pas été rempli correctement',
        'password' => 'Le champ "mot de passe" n\'a pas été rempli correctement',
        'birthdate' => 'Le champ "date de naissance" n\'a pas été rempli correctement',
    ],

    'Unique' => [
        'username' => 'Vous êtes unique. Votre nom d\'utilisateur doit l\'être également.',
        'email' => 'Cette adresse email est déjà associée à un compte.',
    ],

    'String' => [
        'username' => 'Le nom d\'utilisateur saisi n\'est pas une chaîne de caractères valide.',
        'email' => 'L\'adresse email saisie n\'est pas une chaîne de caractères valide.',
        'password' => 'Le mot de passe saisi n\'est pas une chaîne de caractères valide.',
    ],

    'Regex' => [
        'username' => 'Le nom d\'utilisateur doit contenir entre 3 et 25 carcatères alphanumériques.',
        'password' => 'Le mot de passe doit contenir au moins 8 caractères, dont 1 majuscule, 1 minuscule et 1 chiffre.',
    ],

    'Min' => [
        'password' => 'Le mot de passe doit contenir au moins 8 caractères, dont 1 majuscule, 1 minuscule et 1 chiffre.',
    ],

    'Max' => [
        'email' => 'L\'adresse email ne doit pas excéder 75 caractères.',
    ],

    'Between' => [
        'username' => 'Le nom d\'utilisateur doit contenir entre 3 et 25 carcatères alphanumériques.',
    ],

    'Email' => [
        'email' => 'Veuillez saisir une adresse email valide.',
    ],

    'Strength' => [
        'password' => 'Votre mot de passe est trop facile à deviner.'
    ],

    'Confirmed' => [
        'password' => 'Les mots de passe ne correspondent pas.',
    ],

    'Date' => [
        'birthdate' => 'Veuillez entrer une date valide.',
    ],

    'DateFormat' => [
        'birthdate' => 'La date doit être au format mm-jj-yyyy',
    ],

    'Before' => [
        'birthdate' => 'Vous devez être âgé d\'au moins 13 pour créer un compte.',
    ],

    'After' => [
        'birthdate' => 'Vous ne faites pas votre âge ! Mais si vous êtes âgés de 150 ans ou plus vous n\'êtes pas humains, et seuls les habitants de la planète Terre sont autorisés ici. Pour le moment...',
    ],
];
