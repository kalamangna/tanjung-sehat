<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityLogModel extends Model
{
    protected $table            = 'activity_logs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['user_id', 'action', 'module', 'details', 'ip_address', 'user_agent'];
    protected $useTimestamps    = false;
    protected $createdField     = 'created_at';
    
    // Manual insert since useTimestamps is false but we want created_at
    protected $beforeInsert = ['setCreatedAt'];

    protected function setCreatedAt(array $data)
    {
        $data['data']['created_at'] = date('Y-m-d H:i:s');
        return $data;
    }
}