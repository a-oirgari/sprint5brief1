<div class="auth-header">
    <h1>🎯 TalentHub</h1>
    <p>Créez votre compte</p>
</div>

<div class="auth-content">
    <?php if (isset($error)): ?>
        <div class="alert alert-error"><?= $error ?></div>
    <?php endif; ?>

    <?php if (isset($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>

    <form method="POST" action="<?= base_url('/register') ?>" id="registerForm">
        <div class="form-group">
            <label for="name">Nom complet *</label>
            <input type="text" id="name" name="name" required 
                   value="<?= isset($old['name']) ? escape($old['name']) : '' ?>">
        </div>

        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" id="email" name="email" required 
                   value="<?= isset($old['email']) ? escape($old['email']) : '' ?>">
        </div>

        <div class="form-group">
            <label for="role_id">Je suis *</label>
            <select id="role_id" name="role_id" required>
                <option value="">-- Sélectionnez votre rôle --</option>
                <?php foreach ($roles as $role): ?>
                    <option value="<?= $role->getId() ?>" 
                            <?= isset($old['role_id']) && $old['role_id'] == $role->getId() ? 'selected' : '' ?>>
                        <?= $role->getName() === 'candidate' ? '👤 Candidat' : '🏢 Recruteur' ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group company-field" id="companyField">
            <label for="company_name">Nom de l'entreprise *</label>
            <input type="text" id="company_name" name="company_name" 
                   value="<?= isset($old['company_name']) ? escape($old['company_name']) : '' ?>">
        </div>

        <div class="form-group">
            <label for="password">Mot de passe *</label>
            <input type="password" id="password" name="password" required>
            <small style="color: #666;">Au moins 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial</small>
        </div>

        <div class="form-group">
            <label for="password_confirm">Confirmez le mot de passe *</label>
            <input type="password" id="password_confirm" name="password_confirm" required>
        </div>

        <button type="submit" class="btn">S'inscrire</button>
    </form>

    <div class="text-center">
        <p>Vous avez déjà un compte ? <a href="/login">Connectez-vous</a></p>
    </div>
</div>

<script>
    document.getElementById('role_id').addEventListener('change', function() {
        const companyField = document.getElementById('companyField');
        const companyInput = document.getElementById('company_name');
        const selectedOption = this.options[this.selectedIndex].text;
        
        if (selectedOption.includes('Recruteur')) {
            companyField.style.display = 'block';
            companyInput.required = true;
        } else {
            companyField.style.display = 'none';
            companyInput.required = false;
            companyInput.value = '';
        }
    });

    window.addEventListener('DOMContentLoaded', function() {
        const roleSelect = document.getElementById('role_id');
        if (roleSelect.value) {
            roleSelect.dispatchEvent(new Event('change'));
        }
    });
</script>