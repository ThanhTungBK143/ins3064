<?php
// roles_arrays.php

// Permissions for each role
$roles = [
    'admin' => ['view_user', 'create_user', 'edit_user', 'delete_user'],
    'user'  => ['view_user', 'edit_own_profile'],
    'guest' => ['view_user']
];

// Assign role to users by user ID
$user_roles = [
    1 => 'admin',
    2 => 'user',
    3 => 'guest',
    // add more users as needed
];

// Example users array (optional helper)
$users = [
    1 => ['username' => 'alice', 'role' => 'admin'],
    2 => ['username' => 'bob',   'role' => 'user'],
    3 => ['username' => 'eve',   'role' => 'guest'],
];
?>
