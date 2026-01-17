<?php

class RecruiterController
{
    public function dashboard()
    {
        $user = auth();
        
        View::renderWithLayout('recruiter/dashboard', [
            'user' => $user,
            'pageTitle' => 'Dashboard Recruteur'
        ]);
    }

    public function profile()
    {
        $user = auth();
        
        View::renderWithLayout('recruiter/profile', [
            'user' => $user,
            'pageTitle' => 'Mon Profil'
        ]);
    }
}