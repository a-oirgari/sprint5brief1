<?php

class CandidateController
{
    public function dashboard()
    {
        $user = auth();
        
        View::renderWithLayout('candidate/dashboard', [
            'user' => $user,
            'pageTitle' => 'Dashboard Candidat'
        ]);
    }

    public function profile()
    {
        $user = auth();
        
        View::renderWithLayout('candidate/profile', [
            'user' => $user,
            'pageTitle' => 'Mon Profil'
        ]);
    }
}