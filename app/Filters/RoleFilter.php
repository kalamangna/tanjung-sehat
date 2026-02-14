<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    /**
     * @param array|null $arguments In this enhanced version, arguments can be roles OR permissions
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('admin/login');
        }

        if (empty($arguments)) {
            return;
        }

        $userRole = session()->get('role');
        
        // If user is Superadmin, skip all checks
        if ($userRole === 'Superadmin') {
            return;
        }

        $hasAccess = false;
        foreach ($arguments as $arg) {
            // Check if it's a role match
            if ($userRole === $arg) {
                $hasAccess = true;
                break;
            }
            // Check if it's a permission match
            if (has_permission($arg)) {
                $hasAccess = true;
                break;
            }
        }

        if (!$hasAccess) {
            return redirect()->to('admin')->with('error', 'Unauthorized access: You do not have the required permissions.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
