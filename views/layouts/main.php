<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? escape($pageTitle) . ' - ' : '' ?>TalentHub</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; background: white; border-radius: 10px; box-shadow: 0 10px 40px rgba(0,0,0,0.2); overflow: hidden; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px 30px; display: flex; justify-content: space-between; align-items: center; }
        .header h1 { font-size: 24px; }
        .nav { display: flex; gap: 20px; }
        .nav a { color: white; text-decoration: none; padding: 8px 16px; border-radius: 5px; transition: background 0.3s; }
        .nav a:hover { background: rgba(255,255,255,0.2); }
        .content { padding: 40px 30px; }
        .user-info { display: flex; align-items: center; gap: 15px; }
        .user-badge { background: rgba(255,255,255,0.2); padding: 5px 12px; border-radius: 20px; font-size: 14px; }
        .logout-btn { background: rgba(255,255,255,0.3); border: none; color: white; padding: 8px 16px; border-radius: 5px; cursor: pointer; text-decoration: none; display: inline-block; transition: background 0.3s; }
        .logout-btn:hover { background: rgba(255,255,255,0.4); }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎯 TalentHub</h1>
            <div class="user-info">
                <?php $currentUser = auth(); ?>
                <?php if ($currentUser): ?>
                    <span>Bonjour, <strong><?= escape($currentUser->getName()) ?></strong></span>
                    <span class="user-badge">
                        <?php
                            $role = $currentUser->getRole();
                            $roleDisplay = [
                                'candidate' => '👤 Candidat',
                                'recruiter' => '🏢 Recruteur',
                                'admin' => '🛡️ Admin'
                            ];
                            echo $roleDisplay[$role->getName()] ?? $role->getName();
                        ?>
                    </span>
                    <a href="<?= base_url('/logout') ?>" class="logout-btn">Déconnexion</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="content">
            <?= $content ?>
        </div>
    </div>
</body>
</html>