<div class="dashboard">
    <h2>👤 Mon Profil Candidat</h2>
    
    <div class="welcome-card">
        <h1>Votre Profil</h1>
        <p><strong>Nom:</strong> <?= escape($user->getName()) ?></p>
        <p><strong>Email:</strong> <?= escape($user->getEmail()) ?></p>
        <p><strong>Date d'inscription:</strong> <?= escape($user->getCreatedAt()) ?></p>
    </div>

    <div style="margin-top: 40px; padding: 30px; background: #f8f9fa; border-radius: 10px;">
        <h3 style="color: #667eea; margin-bottom: 15px;">📋 Informations personnelles</h3>
        <ul style="text-align: left; max-width: 600px; margin: 0 auto; color: #666;">
            <li style="margin-bottom: 10px;">Fonctionnalité en cours de développement</li>
            <li style="margin-bottom: 10px;">Bientôt : CV, compétences, expériences...</li>
        </ul>
    </div>
</div>