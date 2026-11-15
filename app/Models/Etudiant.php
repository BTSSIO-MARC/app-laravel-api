<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Connection;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\WithoutTimestamps;

#[Connection('mariadb')]
#[Fillable(['nom', 'prenom', 'date_naissance', 'boursier'])]
#[Table('etudiant')]
#[WithoutTimestamps]
class Etudiant extends Model
{
    //
}
