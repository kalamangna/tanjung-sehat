<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RoleModel;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $this->data['title'] = 'Manajemen Pengguna';
        $this->data['users'] = $userModel->select('users.*, roles.name as role_name')
                                         ->join('roles', 'roles.id = users.role_id', 'left')
                                         ->findAll();
        return view('admin/users/index', $this->data);
    }

    public function new()
    {
        $roleModel = new RoleModel();
        $this->data['title'] = 'Tambah Pengguna Baru';
        $this->data['roles'] = $roleModel->findAll();
        return view('admin/users/form', $this->data);
    }

    public function create()
    {
        $userModel = new UserModel();
        $rules = [
            'username' => 'required|is_unique[users.username]|min_length[4]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'name'     => 'required',
            'role_id'  => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        
        $userModel->insert($data);
        log_activity('Create User', 'Users', 'Created user: ' . $data['username']);
        
        return redirect()->to('admin/users')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function delete($id)
    {
        if ($id == session()->get('id')) {
            return redirect()->back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $userModel = new UserModel();
        $userModel->delete($id);
        log_activity('Delete User', 'Users', 'Deleted user ID: ' . $id);
        
        return redirect()->to('admin/users')->with('success', 'Pengguna berhasil dihapus.');
    }
}