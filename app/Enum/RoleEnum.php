<?php

namespace App\Enum;

enum RoleEnum: string
{
    case ADMIN = 'Admin';
    case RESP_GROUP = 'Responsable Groupe';
    case USER = 'Utilisateur';
}
