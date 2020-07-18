<?php

function getUsersLevels(){
    global $App;

    $levels = array();
    $allowedLevels = array(
        0 => "Visitante",
        1 => "Usuario",
        2 => "Supervisor",
        3 => "Administrador",
        4 => "Dev",
    );

    if ($App->user->isLogged()) {
        for ($i=0; $i < $App->user->data['level']; $i++) {
            if (isset($allowedLevels[$i])) {
                $levels[$i] = $allowedLevels[$i];
            }
        }
    }

    return $levels;
};
