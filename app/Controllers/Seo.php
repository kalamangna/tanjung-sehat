<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use App\Models\BlogModel;
use App\Models\DoctorModel;

class Seo extends BaseController
{
    public function sitemap()
    {
        $serviceModel = new ServiceModel();
        $blogModel = new BlogModel();
        $doctorModel = new DoctorModel();

        $data = [
            'services' => $serviceModel->where('is_active', 1)->findAll(),
            'blogs'    => $blogModel->where('status', 'published')->findAll(),
            'doctors'  => $doctorModel->where('is_active', 1)->findAll(),
            'pages'    => ['', 'about', 'contact', 'services', 'doctors', 'blog', 'privacy-policy', 'disclaimer']
        ];

        return $this->response
            ->setHeader('Content-Type', 'text/xml; charset=utf-8')
            ->setBody(view('seo/sitemap', $data));
    }

    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Sitemap: " . base_url('sitemap.xml') . "\n";

        return $this->response
            ->setHeader('Content-Type', 'text/plain')
            ->setBody($content);
    }
}