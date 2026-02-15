<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function about()
    {
        $this->data['title'] = 'Tentang Kami';
        $this->data['meta_desc'] = 'Profil Klinik Tanjung Sehat, visi misi, dan komitmen kami dalam memberikan pelayanan kesehatan terbaik bagi masyarakat Makassar.';
        return view('frontend/about', $this->data);
    }

    public function contact()
    {
        $this->data['title'] = 'Hubungi Kami';
        $this->data['meta_desc'] = 'Kontak dan lokasi Klinik Tanjung Sehat. Hubungi kami via telepon atau WhatsApp untuk pendaftaran dan informasi lebih lanjut.';
        return view('frontend/contact', $this->data);
    }

    public function pharmacy()
    {
        $this->data['title'] = 'Apotek Kami';
        $this->data['meta_desc'] = 'Apotek Tanjung Sehat menyediakan obat-obatan lengkap dan alat kesehatan. Melayani resep dokter dan konsultasi obat.';
        return view('frontend/pharmacy', $this->data);
    }

    public function gallery()
    {
        $galleryModel = new \App\Models\GalleryModel();
        $this->data['title'] = 'Galeri Foto';
        $this->data['meta_desc'] = 'Dokumentasi fasilitas dan kegiatan di Klinik & Apotek Tanjung Sehat.';
        $this->data['items'] = $galleryModel->findAll();
        return view('frontend/gallery', $this->data);
    }

    public function privacy()
    {
        $this->data['title'] = 'Kebijakan Privasi';
        $this->data['meta_desc'] = 'Kebijakan privasi Klinik Tanjung Sehat terkait pengelolaan data pribadi pasien dan pengunjung website.';
        return view('frontend/privacy', $this->data);
    }

    public function disclaimer()
    {
        $this->data['title'] = 'Disclaimer';
        $this->data['meta_desc'] = 'Disclaimer penggunaan informasi kesehatan pada website Klinik Tanjung Sehat.';
        return view('frontend/disclaimer', $this->data);
    }
}