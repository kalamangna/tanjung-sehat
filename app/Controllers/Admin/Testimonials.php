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

    public function new()
    {
        $this->data['title'] = 'Tambah Testimoni';
        return view('admin/testimonials/form', $this->data);
    }

    public function create()
    {
        $testiModel = new TestimonialModel();
        
        $rules = [
            'name'    => 'required|min_length[3]',
            'content' => 'required',
            'rating'  => 'required|is_natural_no_zero|less_than_equal_to[5]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;

        $testiModel->insert($data);
        log_activity('Tambah Testimoni', 'Testimoni', 'Menambahkan testimoni dari: ' . $data['name']);

        return redirect()->to('admin/testimonials')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $testiModel = new TestimonialModel();
        $testi = $testiModel->find($id);
        
        if (!$testi) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $this->data['title'] = 'Edit Testimoni';
        $this->data['testimonial'] = $testi;
        return view('admin/testimonials/form', $this->data);
    }

    public function update($id)
    {
        $testiModel = new TestimonialModel();
        
        $rules = [
            'name'    => 'required|min_length[3]',
            'content' => 'required',
            'rating'  => 'required|is_natural_no_zero|less_than_equal_to[5]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;

        $testiModel->update($id, $data);
        log_activity('Perbarui Testimoni', 'Testimoni', 'Memperbarui ID: ' . $id);

        return redirect()->to('admin/testimonials')->with('success', 'Testimoni berhasil diperbarui.');
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
        log_activity('Hapus Testimoni', 'Testimoni', 'Menghapus ID: ' . $id);
        return redirect()->to('admin/testimonials')->with('success', 'Testimoni berhasil dihapus.');
    }
}