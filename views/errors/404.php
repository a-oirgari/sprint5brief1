<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page non trouvée</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px; }
        .error-container { text-align: center; color: white; }
        .error-code { font-size: 120px; font-weight: bold; text-shadow: 3px 3px 10px rgba(0,0,0,0.3); }
        .error-message { font-size: 24px; margin-bottom: 30px; }
        .btn { display: inline-block; padding: 15px 40px; background: white; color: #667eea; text-decoration: none; border-radius: 50px; font-weight: 600; transition: all 0.3s; }
        .btn:hover { transform: translateY(-3px); box-shadow: 0 10px 25px rgba(0,0,0,0.3); }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">404</div>
        <div class="error-message">Page non trouvée</div>
        <p style="margin-bottom: 30px;">La page que vous recherchez n'existe pas.</p>
        <a href="/" class="btn">Retour à l'accueil</a>
    </div>
</body>
</html>