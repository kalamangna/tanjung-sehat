<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ServiceModel;
use App\Models\DoctorModel;
use App\Models\BlogModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $this->data['title'] = 'Dashboard';
        
        $serviceModel = new ServiceModel();
        $doctorModel = new DoctorModel();
        $blogModel = new BlogModel();

        $this->data['stats'] = [
            'services' => $serviceModel->countAll(),
            'doctors'  => $doctorModel->countAll(),
            'blogs'    => $blogModel->countAll(),
        ];

        return view('admin/dashboard', $this->data);
    }
}
