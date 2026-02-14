<?php

namespace App\Models;

use CodeIgniter\Model;

class PermissionModel extends Model
{
    protected $table            = 'permissions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['name', 'description'];
    protected $useTimestamps    = true;

    public function getPermissionsByRole($roleId)
    {
        return $this->select('permissions.name')
                    ->join('role_permissions', 'role_permissions.permission_id = permissions.id')
                    ->where('role_permissions.role_id', $roleId)
                    ->findAll();
    }
}