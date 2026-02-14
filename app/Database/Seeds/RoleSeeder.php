<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'        => 'Superadmin',
                'description' => 'Full access to all modules, users, and settings.'
            ],
            [
                'name'        => 'Admin',
                'description' => 'Manage clinic content (Services, Doctors, etc.) but no system settings.'
            ],
            [
                'name'        => 'Blog Editor',
                'description' => 'Full access to Blog and Categories only.'
            ],
        ];

        $this->db->table('roles')->insertBatch($data);
    }
}