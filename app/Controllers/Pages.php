<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function about()
    {
        $this->data['title'] = 'Tentang Kami';
        return view('frontend/about', $this->data);
    }

    public function contact()
    {
        $this->data['title'] = 'Hubungi Kami';
        return view('frontend/contact', $this->data);
    }

    public function pharmacy()
    {
        $this->data['title'] = 'Apotik Kami';
        return view('frontend/pharmacy', $this->data);
    }

    public function gallery()
    {
        $galleryModel = new \App\Models\GalleryModel();
        $this->data['title'] = 'Galeri Foto';
        $this->data['items'] = $galleryModel->findAll();
        return view('frontend/gallery', $this->data);
    }

    public function privacy()
    {
        $this->data['title'] = 'Kebijakan Privasi';
        return view('frontend/privacy', $this->data);
    }

    public function disclaimer()
    {
        $this->data['title'] = 'Disclaimer';
        return view('frontend/disclaimer', $this->data);
    }
}