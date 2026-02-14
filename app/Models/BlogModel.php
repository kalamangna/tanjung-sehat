<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table            = 'blogs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['category_id', 'title', 'slug', 'summary', 'content', 'image', 'meta_title', 'meta_desc', 'status'];
    protected $useTimestamps    = true;

    public function getWithCategory()
    {
        return $this->select('blogs.*, blog_categories.name as category_name')
                    ->join('blog_categories', 'blog_categories.id = blogs.category_id')
                    ->findAll();
    }
}