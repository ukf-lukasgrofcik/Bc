<?php

return [

    'clearance' => [
        'superadmin' => ['superadmin'], // Superadmin
        'admin' => ['superadmin', 'admin'], // Vedúci fakulty
        'workplace_leader' => ['superadmin', 'admin', 'workplace_leader'], // Vedúci pracoviska
        'lecturer' => ['superadmin', 'admin', 'workplace_leader', 'lecturer'], // Profesor
        'student' => ['superadmin', 'student'], // Študent
        'owner' => ['superadmin', 'owner'], // Majiteľ firmy
        'employee' => ['superadmin', 'owner', 'employee'], // Pracovník firmy
    ],

];
