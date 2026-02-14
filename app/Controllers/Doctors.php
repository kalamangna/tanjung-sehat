<?php

namespace App\Controllers;

use App\Models\DoctorModel;

class Doctors extends BaseController
{
    public function index()
    {
        $doctorModel = new DoctorModel();
        $this->data['title'] = 'Dokter Kami';
        $this->data['doctors'] = $doctorModel->where('is_active', 1)->findAll();
        return view('frontend/doctors', $this->data);
    }

    public function detail($slug)
    {
        $doctorModel = new DoctorModel();
        $doctor = $doctorModel->where('slug', $slug)->first();
        
        if (!$doctor) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $this->data['title'] = $doctor['name'];
        $this->data['doctor'] = $doctor;
        return view('frontend/doctor_detail', $this->data);
    }
}