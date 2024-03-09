'use strict';

// Lorsque le DOM est entièrement chargé
document.addEventListener('DOMContentLoaded', function() {
    // Écouteur d'événement pour la soumission du formulaire d'inscription
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        // Validation de base côté client
        const errorMessages = [];
        const username = document.getElementById('username').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value;
        const password_confirm = document.getElementById('password_confirm').value;

        if (!username) {
            errorMessages.push("Nom d'utilisateur OBLIGATOIRE");
        }
        if (!email || !/^\S+@\S+\.\S+$/.test(email)) {
            errorMessages.push("Adresse e-mail invalide");
        }
        if (password.length < 8) {
            errorMessages.push("Le mot de passe doit contenir au moins 8 caractères");
        }
        if (!/(?=.*[A-Za-z])(?=.*\d)(?=.*[$@!%*#?&])[A-Za-z\d$@!%*#?&]{8,}/.test(password)) {
            errorMessages.push("Le mot de passe doit contenir au moins une lettre, un chiffre et un caractère spécial");
        }
        if (password !== password_confirm) {
            errorMessages.push("Les mots de passe doivent être identiques");
        }

        // Afficher les messages d'erreur s'il y en a
        if (errorMessages.length > 0) {
            event.preventDefault(); // Empêcher la soumission du formulaire
            const errorContainer = document.getElementById('errorContainer');
            errorContainer.innerHTML = ""; // Effacer les erreurs précédentes
            errorMessages.forEach(function(message) {
                const errorMessage = document.createElement('div');
                errorMessage.textContent = message;
                errorMessage.classList.add('alert', 'alert-danger'); // Ajouter la classe d'alerte Bootstrap
                errorContainer.appendChild(errorMessage);
            });
        }
    });
});
