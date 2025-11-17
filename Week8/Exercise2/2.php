<?php
// permission_functions.php
require_once 'roles_arrays.php';

/**
 * Check permission by user_id and permission string.
 * Returns true if user has the permission, false otherwise.
 */
function hasPermission($user_id, $permission) {
    global $user_roles, $roles;

    if (!isset($user_roles[$user_id])) {
        return false; // unknown user defaults to no permissions
    }

    $user_role = $user_roles[$user_id] ?? 'guest';
    $role_permissions = $roles[$user_role] ?? [];

    return in_array($permission, $role_permissions, true);
}

// Usage example:
// var_dump(hasPermission(1, 'delete_user')); // true for admin
?>
