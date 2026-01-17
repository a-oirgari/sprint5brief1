<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - TalentHub</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .hero {
            text-align: center;
            color: white;
            max-width: 800px;
        }

        .hero h1 {
            font-size: 56px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 40px;
            opacity: 0.95;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .btn {
            padding: 15px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 18px;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-block;
        }

        .btn-primary {
            background: white;
            color: #667eea;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-top: 60px;
        }

        .feature {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }

        .feature h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="hero">
        <h1>🎯 TalentHub</h1>
        <p>La plateforme qui connecte candidats et recruteurs de manière simple et efficace</p>

        <div class="cta-buttons">
            <a href="<?= base_url('/register') ?>" class="btn btn-primary">Commencer maintenant</a>
            <a href="<?= base_url('/login') ?>" class="btn btn-secondary">Se connecter</a>
        </div>

        <div class="features">
            <div class="feature">
                <h3>👤</h3>
                <h3>Pour les candidats</h3>
                <p>Trouvez l'emploi de vos rêves</p>
            </div>
            <div class="feature">
                <h3>🏢</h3>
                <h3>Pour les recruteurs</h3>
                <p>Trouvez les meilleurs talents</p>
            </div>
            <div class="feature">
                <h3>🔐</h3>
                <h3>Sécurisé</h3>
                <p>Vos données sont protégées</p>
            </div>
        </div>
    </div>
</body>

</html>