<?php
 

return [
    'main' => [
        //'companies'  => array('title' => 'Empresas', 'url' => 'companies'),
        'jobs'          => ['title' => 'Ofertas de empleo', 'url' => 'jobs', 'roles' => ['jobseeker', 'admin']],
        'resumes'       => ['title' => 'Hojas de vida', 'url' => 'resumes', 'roles' => ['employer', 'admin']],
        //'registers'     => ['url' => 'admin/registers', 'title' => 'Activaciones', 'roles' => 'admin'],
        'applications'  => ['url' => 'admin/applications', 'title' => 'Solicitudes', 'roles' => 'admin'],
        'assists'       => ['url' => 'admin/assists', 'title' => 'Asistencias', 'roles' => 'admin']
    ],
    'right' => [
        //'search'	=> ['title' => 'Buscar', 'i' => 'fa fa-search', 'class' => 'mj_searchbtn', 'include' => 'includes.search'],
        'register'  => ['title' => 'Registrarse', 'url' => 'register', 'i' => 'fa fa-lock', 'logged' => false],
        'login'     => ['title' => 'Iniciar Sesión', 'url' => 'login', 'i' => 'fa fa-user', 'logged' => false],
        'user'      => ['title' => '', 'url' => '#', 'i' => 'fa fa-angle-down', 'class' => 'mj_profileimg', 'img' => 'user', 'logged' => true]
    ],
    'account' => [
        // Auth user
        'account'       => ['title' => 'Mi Cuenta', 'url' => 'account', 'i' => 'fa fa-cogs', 'logged' => true],

        // Admin user
        'company-categories'    => ['url' => 'admin/company-categories', 'title' => 'Categorías de empresa', 'i' => 'fa fa-building', 'roles' => 'admin'],
        'activities'            => ['url' => 'admin/activities', 'title' => 'Actividades', 'i' => 'fa fa-tasks', 'roles' => 'admin'],
        //'job-categories'        => array('url' => 'admin/job-categories', 'title' => 'Categorías de trabajo', 'i' => 'fa fa-mortar-board', 'roles' => 'admin'),
        'companies'             => ['url' => 'admin/companies', 'title' => 'Empresas (Demandantes)', 'i' => 'fa fa-building-o', 'roles' => 'admin'],
        'rsumes'                => ['url' => 'admin/registers', 'title' => 'Trabajadores (Oferentes)', 'i' => 'fa fa-user', 'roles' => 'admin'],
        'contract-types'        => ['url' => 'admin/contract-types', 'title' => 'Tipos de contrato', 'i' => 'fa fa-briefcase', 'roles' => 'admin'],
        //'jobs'                  => array('url' => 'admin/jobs', 'title' => 'Trabajos', 'i' => 'fa fa-location-arrow', 'roles' => 'admin'),
        'occupations'           => ['url' => 'admin/occupations', 'title' => 'Ocupaciones y Oficios', 'i' => 'fa fa-user-secret', 'roles' => 'admin'],
        'profiles'              => ['url' => 'admin/profiles', 'title' => 'Perfiles', 'i' => 'fa fa-users', 'roles' => 'admin'],
        //'locations'             => ['url' => 'admin/geo-locations', 'title' => 'Ubicaciones', 'i' => 'fa fa-map-marker', 'roles' => 'admin'],
        'stats'                 => ['url' => 'admin/stats', 'title' => 'Estadísticas', 'i' => 'fa fa-pie-chart', 'roles' => 'admin'],
        'admins'                => ['url' => 'admin/admins', 'title' => 'Administradores', 'i' => 'fa fa-user', 'roles' => 'admin'],
        'parameters'            => ['url' => 'admin/parameters', 'title' => 'Parámetros', 'i' => 'fa fa-cog', 'roles' => 'admin'],

        // Jobseeker user
        'resume'        => ['title' => 'Hoja de vida', 'url' => 'my-resume', 'i' => 'fa fa-mortar-board', 'roles' => 'jobseeker'],
        'applications'  => [
            'title' => 'Mis solicitudes', 
            'url' => 'my-applications', 
            'i' => 'fa fa-flash', 
            'allows' => [
                'isJobseeker', ':user'
            ]
        ],

        // Employer user
        'company'       => ['title' => 'Mi Empresa', 'url' => 'my-company', 'i' => 'fa fa-building', 'roles' => 'employer'],

        'employer-jobs' => [
            'title' => 'Mis ofertas', 
            'url' => 'my-jobs', 
            'i' => 'fa fa-star', 
            'allows' => [
                'createJobs', ':company'
            ]
        ],
        'logout'        => ['title' => 'Cerrar sesión', 'url' => 'logout', 'logged' => true],
    ]
];