<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TestimonialModel;

class Testimonials extends BaseController
{
    public function index()
    {
        $testiModel = new TestimonialModel();
        $this->data['title'] = 'Manajemen Testimoni';
        $this->data['testimonials'] = $testiModel->findAll();
        return view('admin/testimonials/index', $this->data);
    }

    public function toggle($id)
    {
        $testiModel = new TestimonialModel();
        $testi = $testiModel->find($id);
        $testiModel->update($id, ['is_active' => !$testi['is_active']]);
        return redirect()->to('admin/testimonials')->with('success', 'Status testimoni berhasil diperbarui.');
    }

    public function delete($id)
    {
        $testiModel = new TestimonialModel();
        $testiModel->delete($id);
        log_activity('Delete Testimonial', 'Testimonials', 'Deleted ID: ' . $id);
        return redirect()->to('admin/testimonials')->with('success', 'Testimoni berhasil dihapus.');
    }
}