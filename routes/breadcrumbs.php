<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


//Account Management
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('akun.permission.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Permission', route('akun.permission.index'));
});
