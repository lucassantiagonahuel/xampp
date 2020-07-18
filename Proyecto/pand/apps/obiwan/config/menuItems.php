<?php

function loadMenuItems(){
    global $App;

    if ($App->user->isLogged()) {
        $menu_items = array();

        $menu_items[] = new \pand\MenuItem('Estudios','/estudios', ($App->request->path == 'estudios')?'active':'');
        $menu_items[] = new \pand\MenuItem('Usuarios','/users', ($App->request->path == 'users')?'active':'');

        $App->menuItems = $menu_items;
    }
};
