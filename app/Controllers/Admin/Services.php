<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ServiceModel;

class Services extends BaseController
{
    public function index()
    {
        $serviceModel = new ServiceModel();
        $this->data['title'] = 'Kelola Layanan';
        $this->data['services'] = $serviceModel->findAll();
        return view('admin/services/index', $this->data);
    }

    public function new()
    {
        $this->data['title'] = 'Tambah Layanan Baru';
        return view('admin/services/form', $this->data);
    }

    public function create()
    {
        $serviceModel = new ServiceModel();
        
        $rules = [
            'title'       => 'required|min_length[3]',
            'description' => 'required',
            'content'     => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();
        $data['slug'] = url_title($data['title'], '-', true);
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;

        $serviceModel->insert($data);
        log_activity('Tambah Layanan', 'Layanan', 'Menambahkan: ' . $data['title']);

        return redirect()->to('admin/services')->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $serviceModel = new ServiceModel();
        $service = $serviceModel->find($id);
        
        if (!$service) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $this->data['title'] = 'Edit Layanan: ' . $service['title'];
        $this->data['service'] = $service;
        return view('admin/services/form', $this->data);
    }

    public function update($id)
    {
        $serviceModel = new ServiceModel();
        
        $rules = [
            'title'       => 'required|min_length[3]',
            'description' => 'required',
            'content'     => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();
        $data['slug'] = url_title($data['title'], '-', true);
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;

        $serviceModel->update($id, $data);
        log_activity('Perbarui Layanan', 'Layanan', 'Memperbarui ID: ' . $id);

        return redirect()->to('admin/services')->with('success', 'Layanan berhasil diperbarui');
    }

    public function delete($id)
    {
        $serviceModel = new ServiceModel();
        $serviceModel->delete($id);
        log_activity('Hapus Layanan', 'Layanan', 'Menghapus ID: ' . $id);
        return redirect()->to('admin/services')->with('success', 'Layanan berhasil dihapus');
    }
}