<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table            = 'settings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['key', 'value', 'group'];
    protected $useTimestamps    = true;

    public function getGrouped()
    {
        $settings = $this->findAll();
        $grouped = [];
        foreach ($settings as $setting) {
            $grouped[$setting['key']] = $setting['value'];
        }
        return $grouped;
    }
}