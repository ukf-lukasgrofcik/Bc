<?php

return [
    'superadmin' => [ 'superadmin' ],

    'admin' => [ 'admin' ],
    'workplace_leader' => [ 'admin', 'workplace_leader' ],
    'lecturer' => [ 'admin', 'workplace_leader', 'lecturer' ],

    'student' => [ 'student' ],

    'owner' => [ 'owner' ],
    'employee' => [ 'owner', 'employee' ],
];
