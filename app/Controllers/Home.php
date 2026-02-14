<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use App\Models\DoctorModel;
use App\Models\BlogModel;
use App\Models\TestimonialModel;

class Home extends BaseController
{
    public function index()
    {
        $serviceModel = new ServiceModel();
        $doctorModel = new DoctorModel();
        $blogModel = new BlogModel();
        $testimonialModel = new TestimonialModel();

        $this->data['title'] = 'Home';
        $this->data['services'] = $serviceModel->where('is_active', 1)->limit(6)->findAll();
        $this->data['doctors'] = $doctorModel->where('is_active', 1)->limit(4)->findAll();
        $this->data['blogs'] = $blogModel->getWithCategory(); // In real app, maybe limit and sort
        $this->data['testimonials'] = $testimonialModel->where('is_active', 1)->findAll();

        return view('frontend/index', $this->data);
    }
}