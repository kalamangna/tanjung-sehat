<?php

namespace App\Controllers;

use App\Models\ServiceModel;

class Services extends BaseController
{
            public function index()
            {
                $serviceModel = new ServiceModel();
                $this->data['title'] = 'Layanan Kami';
                $this->data['meta_desc'] = 'Daftar layanan kesehatan lengkap di Klinik Tanjung Sehat: Poli Umum, Gigi, Anak, Laboratorium, dan Apotek 24 Jam.';
                $this->data['services'] = $serviceModel->where('is_active', 1)->findAll();
                return view('frontend/services', $this->data);
            }
        }
        