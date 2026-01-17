<div class="auth-header">
    <h1>🎯 TalentHub</h1>
    <p>Connectez-vous à votre compte</p>
</div>

<div class="auth-content">
    <?php if (isset($error)): ?>
        <div class="alert alert-error"><?= $error ?></div>
    <?php endif; ?>

    <?php if (isset($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>

    <form method="POST" action="<?= base_url('/login') ?>">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" class="btn">Se connecter</button>
    </form>

    <div class="text-center">
        <p>Vous n'avez pas de compte ? <a href="/register">Inscrivez-vous</a></p>
    </div>
</div>