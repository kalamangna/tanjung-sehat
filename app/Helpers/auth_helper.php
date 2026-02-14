<?php

if (!function_exists('has_permission')) {
    /**
     * Check if the currently logged in user has a specific permission.
     * 
     * @param string $permission
     * @return bool
     */
    function has_permission(string $permission): bool
    {
        $permissions = session()->get('permissions') ?? [];
        $role = session()->get('role');

        // Superadmin always has permission
        if ($role === 'Superadmin') {
            return true;
        }

        return in_array($permission, $permissions);
    }
}

if (!function_exists('log_activity')) {
    /**
     * Log a user activity.
     */
    function log_activity(string $action, string $module, ?string $details = null)
    {
        $logModel = new \App\Models\ActivityLogModel();
        $logModel->insert([
            'user_id'    => session()->get('id'),
            'action'     => $action,
            'module'     => $module,
            'details'    => $details,
            'ip_address' => service('request')->getIPAddress(),
            'user_agent' => service('request')->getUserAgent()->getAgentString(),
        ]);
    }
}
