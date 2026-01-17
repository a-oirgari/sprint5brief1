<?php

class AdminController
{
    public function dashboard()
    {
        $user = auth();
        
        View::renderWithLayout('admin/dashboard', [
            'user' => $user,
            'pageTitle' => 'Back-office Admin'
        ]);
    }

    public function manageUsers()
    {
        $user = auth();
        
        View::renderWithLayout('admin/users', [
            'user' => $user,
            'pageTitle' => 'Gestion des utilisateurs'
        ]);
    }
}