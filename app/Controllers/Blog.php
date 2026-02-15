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
        $this->data['blogs'] = $blogModel->getAll('published');
        return view('frontend/blog', $this->data);
    }

    public function detail($slug)
    {
        $blogModel = new BlogModel();
        $blog = $blogModel->where('slug', $slug)->first();
        
        if (!$blog) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $this->data['title'] = $blog['title'];
        
        // Use blog content for meta description
        $this->data['meta_desc'] = mb_substr(strip_tags($blog['content']), 0, 160);
        $this->data['og_image'] = $blog['image'] ? base_url('uploads/blog/' . $blog['image']) : base_url('images/og-image.jpg');
        $this->data['og_type'] = 'article';
        
        $this->data['blog'] = $blog;
        return view('frontend/blog_detail', $this->data);
    }
}