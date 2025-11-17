<?php
// session_role_example.php
session_start();
require_once 'roles_arrays.php'; // provides $roles

// Example: after login you set the user role
// $_SESSION['user_role'] = 'admin';
// For demo, we'll set a role if not set:
if (!isset($_SESSION['user_role'])) {
    $_SESSION['user_role'] = 'guest'; // default
}

/**
 * Check if current session user has required permission.
 */
function checkAccess($required_permission) {
    global $roles;
    $user_role = $_SESSION['user_role'] ?? 'guest';
    $role_permissions = $roles[$user_role] ?? [];
    return in_array($required_permission, $role_permissions, true);
}

// Example usage (in page rendering)
if (checkAccess('delete_user')) {
    echo '<button onclick="location.href=\'delete.php\'">Delete</button>';
}
if (checkAccess('edit_user')) {
    echo '<button onclick="location.href=\'edit.php\'">Edit</button>';
}
?>
