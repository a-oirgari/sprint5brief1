<style>
    .dashboard { text-align: center; }
    .dashboard h2 { color: #e74c3c; font-size: 32px; margin-bottom: 20px; }
    .welcome-card { background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); color: white; padding: 40px; border-radius: 10px; margin-bottom: 30px; }
    .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 30px; }
    .stat-card { background: #f8f9fa; padding: 30px; border-radius: 10px; border: 2px solid #e0e0e0; }
    .stat-card h3 { color: #e74c3c; font-size: 36px; margin-bottom: 10px; }
    .stat-card p { color: #666; font-size: 14px; }
</style>

<div class="dashboard">
    <h2>🏢 Dashboard Recruteur</h2>
    
    <div class="welcome-card">
        <h1>Bienvenue, <?= escape($user->getName()) ?> !</h1>
        <p>Vous êtes connecté en tant que recruteur</p>
        <p><strong>Entreprise:</strong> <?= escape($user->getCompanyName()) ?></p>
        <p><strong>Email:</strong> <?= escape($user->getEmail()) ?></p>
    </div>

    <div class="stats">
        <div class="stat-card">
            <h3>0</h3>
            <p>Offres d'emploi publiées</p>
        </div>
        <div class="stat-card">
            <h3>0</h3>
            <p>Candidatures reçues</p>
        </div>
        <div class="stat-card">
            <h3>0</h3>
            <p>Candidats contactés</p>
        </div>
    </div>

    <div style="margin-top: 40px; padding: 30px; background: #f8f9fa; border-radius: 10px;">
        <h3 style="color: #e74c3c; margin-bottom: 15px;">🚀 Prochaines fonctionnalités</h3>
        <ul style="text-align: left; max-width: 600px; margin: 0 auto; color: #666;">
            <li style="margin-bottom: 10px;">Publier des offres d'emploi</li>
            <li style="margin-bottom: 10px;">Consulter les candidatures</li>
            <li style="margin-bottom: 10px;">Gérer mes offres</li>
            <li style="margin-bottom: 10px;">Messagerie avec les candidats</li>
            <li>Gérer le profil de l'entreprise</li>
        </ul>
    </div>
</div>