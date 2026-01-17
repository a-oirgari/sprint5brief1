<style>
    .dashboard { text-align: center; }
    .dashboard h2 { color: #2ecc71; font-size: 32px; margin-bottom: 20px; }
    .welcome-card { background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%); color: white; padding: 40px; border-radius: 10px; margin-bottom: 30px; }
    .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 30px; }
    .stat-card { background: #f8f9fa; padding: 30px; border-radius: 10px; border: 2px solid #e0e0e0; }
    .stat-card h3 { color: #2ecc71; font-size: 36px; margin-bottom: 10px; }
    .stat-card p { color: #666; font-size: 14px; }
</style>

<div class="dashboard">
    <h2>🛡️ Back-office Administrateur</h2>
    
    <div class="welcome-card">
        <h1>Bienvenue, <?= escape($user->getName()) ?> !</h1>
        <p>Vous êtes connecté en tant qu'administrateur</p>
        <p><strong>Email:</strong> <?= escape($user->getEmail()) ?></p>
    </div>

    <div class="stats">
        <div class="stat-card">
            <h3>0</h3>
            <p>Utilisateurs totaux</p>
        </div>
        <div class="stat-card">
            <h3>0</h3>
            <p>Candidats inscrits</p>
        </div>
        <div class="stat-card">
            <h3>0</h3>
            <p>Recruteurs inscrits</p>
        </div>
        <div class="stat-card">
            <h3>0</h3>
            <p>Offres d'emploi</p>
        </div>
    </div>

    <div style="margin-top: 40px; padding: 30px; background: #f8f9fa; border-radius: 10px;">
        <h3 style="color: #2ecc71; margin-bottom: 15px;">🚀 Prochaines fonctionnalités</h3>
        <ul style="text-align: left; max-width: 600px; margin: 0 auto; color: #666;">
            <li style="margin-bottom: 10px;">Gérer les utilisateurs</li>
            <li style="margin-bottom: 10px;">Modérer les offres d'emploi</li>
            <li style="margin-bottom: 10px;">Consulter les statistiques</li>
            <li style="margin-bottom: 10px;">Gérer les rôles et permissions</li>
            <li>Configurer la plateforme</li>
        </ul>
    </div>
</div>