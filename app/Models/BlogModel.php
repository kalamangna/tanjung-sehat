<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table            = 'blogs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
        protected $allowedFields    = ['title', 'slug', 'summary', 'content', 'image', 'meta_title', 'meta_desc', 'status'];
        protected $useTimestamps    = true;
    
        public function getAll($status = null)
        {
            if ($status) {
                $this->where('status', $status);
            }
    
            return $this->orderBy('created_at', 'DESC')->findAll();
        }
    }
    