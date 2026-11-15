<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

#[Signature('make:user')]
#[Description('Crée un utilisateur de l\'API')]
class CreateUser extends Command
{
    public function handle()
    {
        $this->info('--- Création d\'un compte Utilisateur ---');

        // 1. Demander les informations de manière interactive
        $nom = $this->ask('Nom');
        $email = $this->ask('Email');

        // Utilise secret() pour masquer la saisie du mot de passe à l'écran
        $password = $this->secret('Mot de passe');

        // Validation basique (optionnelle mais recommandée)
        if (User::where('email', $email)->exists()) {
            $this->error('Erreur : Un utilisateur avec cet email existe déjà.');
            return Command::FAILURE;
        }

        // 2. Insérer l'utilisateur avec le rôle 'admin'
        $user = User::create([
            'name' => $nom,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        $this->info("Succès ! L'administrateur {$user->nom} (email: {$user->email}) a été créé avec succès.");

        return Command::SUCCESS;
    }
}
