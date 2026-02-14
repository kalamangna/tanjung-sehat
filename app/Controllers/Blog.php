<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\BlogCategoryModel;

class Blog extends BaseController
{
    public function index()
    {
        $blogModel = new BlogModel();
        $this->data['title'] = 'Blog & Artikel Kesehatan';
        $this->data['blogs'] = $blogModel->getWithCategory();
        return view('frontend/blog', $this->data);
    }

    public function detail($slug)
    {
        $blogModel = new BlogModel();
        $blog = $blogModel->select('blogs.*, blog_categories.name as category_name')
                          ->join('blog_categories', 'blog_categories.id = blogs.category_id')
                          ->where('blogs.slug', $slug)
                          ->first();
        
        if (!$blog) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $this->data['title'] = $blog['title'];
        $this->data['meta_desc'] = $blog['meta_desc'];
        $this->data['blog'] = $blog;
        return view('frontend/blog_detail', $this->data);
    }
}