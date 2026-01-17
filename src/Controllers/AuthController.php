<?php

class AuthController
{
    public function home()
    {
        View::render('home');
    }

    public function showRegisterForm()
    {
        $roles = Role::getAllRoles();

        $availableRoles = array_filter($roles, function ($role) {
            return in_array($role->getName(), ['candidate', 'recruiter']);
        });

        View::renderWithLayout('auth/register', [
            'roles' => $availableRoles,
            'error' => flash('error'),
            'success' => flash('success'),
            'old' => flash('old') ?? []
        ], 'auth');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/register');
            return;
        }

        $name = sanitize($_POST['name'] ?? '');
        $email = sanitize($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $password_confirm = $_POST['password_confirm'] ?? '';
        $role_id = (int) ($_POST['role_id'] ?? 0);
        $company_name = sanitize($_POST['company_name'] ?? '');

        $errors = [];

        if (empty($name)) {
            $errors[] = "Le nom est requis.";
        }

        if (empty($email) || !validateEmail($email)) {
            $errors[] = "L'email est invalide.";
        }

        if (empty($password) || !validatePassword($password)) {
            $errors[] = "Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.";
        }

        if ($password !== $password_confirm) {
            $errors[] = "Les mots de passe ne correspondent pas.";
        }

        $role = Role::findById($role_id);
        if (!$role || $role->getName() === 'admin') {
            $errors[] = "Le rôle sélectionné est invalide.";
        }

        if (User::findByEmail($email)) {
            $errors[] = "Cet email est déjà utilisé.";
        }

        if ($role && $role->getName() === 'recruiter' && empty($company_name)) {
            $errors[] = "Le nom de l'entreprise est requis pour les recruteurs.";
        }

        if (!empty($errors)) {
            setFlash('error', implode('<br>', $errors));
            setFlash('old', [
                'name' => $name,
                'email' => $email,
                'role_id' => $role_id,
                'company_name' => $company_name
            ]);
            redirect('/register');
            return;
        }

        $userData = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role_id' => $role_id,
            'company_name' => $role->getName() === 'recruiter' ? $company_name : null
        ];

        if (User::create($userData)) {
            setFlash('success', 'Inscription réussie ! Vous pouvez maintenant vous connecter.');
            redirect('/login');
        } else {
            setFlash('error', 'Une erreur est survenue lors de l\'inscription.');
            redirect('/register');
        }
    }

    public function showLoginForm()
    {
        View::renderWithLayout('auth/login', [
            'error' => flash('error'),
            'success' => flash('success')
        ], 'auth');
    }

    public function login()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['user_id'])) {
            $user = User::findById($_SESSION['user_id']);
            if ($user) {
                $role = $user->getRole();
                redirect('/' . $role->getName() . '/dashboard');
                return;
            }
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/login');
            return;
        }

        $email = sanitize($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            setFlash('error', 'Veuillez remplir tous les champs.');
            redirect('/login');
            return;
        }

        $user = User::authenticate($email, $password);

        if (!$user) {
            setFlash('error', 'Identifiants incorrects.');
            redirect('/login');
            return;
        }

        session_start();
        session_regenerate_id(true);

        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user_name'] = $user->getName();
        $_SESSION['user_email'] = $user->getEmail();

        $role = $user->getRole();
        $_SESSION['user_role'] = $role->getName();

        redirect('/' . $role->getName() . '/dashboard');
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        setFlash('success', 'Vous avez été déconnecté avec succès.');
        redirect(base_url('/login'));
    }
}