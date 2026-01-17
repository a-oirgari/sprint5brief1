<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Accès refusé</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px; }
        .error-container { text-align: center; color: white; }
        .error-code { font-size: 120px; font-weight: bold; text-shadow: 3px 3px 10px rgba(0,0,0,0.3); }
        .error-message { font-size: 24px; margin-bottom: 30px; }
        .btn { display: inline-block; padding: 15px 40px; background: white; color: #e74c3c; text-decoration: none; border-radius: 50px; font-weight: 600; transition: all 0.3s; margin: 0 10px; }
        .btn:hover { transform: translateY(-3px); box-shadow: 0 10px 25px rgba(0,0,0,0.3); }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">🚫 403</div>
        <div class="error-message">Accès refusé</div>
        <p style="margin-bottom: 30px;">Vous n'avez pas les permissions nécessaires pour accéder à cette page.</p>
        <a href="/" class="btn">Retour à l'accueil</a>
        <a href="/logout" class="btn">Se déconnecter</a>
    </div>
</body>
</html>