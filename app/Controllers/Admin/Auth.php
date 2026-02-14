<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('admin');
        }
        return view('admin/login', $this->data);
    }

    public function attemptLogin()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $user = $userModel->getWithRole($this->request->getVar('username'));

        if ($user && password_verify($this->request->getVar('password'), $user['password'])) {
            // Fetch permissions for this role
            $permModel = new \App\Models\PermissionModel();
            $permissions = $permModel->getPermissionsByRole($user['role_id']);
            $permNames = array_column($permissions, 'name');

            session()->set([
                'id'          => $user['id'],
                'username'    => $user['username'],
                'name'        => $user['name'],
                'role'        => $user['role_name'],
                'permissions' => $permNames,
                'isLoggedIn'  => true,
            ]);

            log_activity('Login', 'Auth', 'User logged in successfully');

            return redirect()->to('admin');
        }

        return redirect()->back()->withInput()->with('error', 'Username atau Password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('admin/login');
    }
}