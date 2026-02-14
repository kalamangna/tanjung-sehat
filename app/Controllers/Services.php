<?php

namespace App\Controllers;

use App\Models\ServiceModel;

class Services extends BaseController
{
    public function index()
    {
        $serviceModel = new ServiceModel();
        $this->data['title'] = 'Layanan Kami';
        $this->data['services'] = $serviceModel->where('is_active', 1)->findAll();
        return view('frontend/services', $this->data);
    }

    public function detail($slug)
    {
        $serviceModel = new ServiceModel();
        $service = $serviceModel->where('slug', $slug)->first();
        
        if (!$service) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $this->data['title'] = $service['title'];
        $this->data['service'] = $service;
        return view('frontend/service_detail', $this->data);
    }
}