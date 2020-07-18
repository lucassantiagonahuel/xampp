<?php

function loadMenuItems(){
    global $App;

    if ($App->user->isLogged()) {
        $menu_items = array();

        $menu_items[] = new \pand\MenuItem('Federaciones','/admin/federaciones', ($App->request->path == 'admin/federaciones')?'active':'');
        $menu_items[] = new \pand\MenuItem('Equipos','/admin/equipos', ($App->request->path == 'admin/equipos')?'active':'');
        $menu_items[] = new \pand\MenuItem('Jugadores','/admin/jugadores', ($App->request->path == 'admin/jugadores')?'active':'');
        $menu_items[] = new \pand\MenuItem('Inscripciones','/admin/inscripciones', ($App->request->path == 'admin/inscripciones')?'active':'');

        $App->menuItems = $menu_items;
    }
};
