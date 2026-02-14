<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DoctorModel;

class Doctors extends BaseController
{
    public function index()
    {
        $doctorModel = new DoctorModel();
        $this->data['title'] = 'Manage Doctors';
        $this->data['doctors'] = $doctorModel->findAll();
        return view('admin/doctors/index', $this->data);
    }

    public function new()
    {
        $this->data['title'] = 'Add New Doctor';
        return view('admin/doctors/form', $this->data);
    }

    public function create()
    {
        $doctorModel = new DoctorModel();
        
        $rules = [
            'name'      => 'required|min_length[3]',
            'specialty' => 'required',
            'image'     => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]|max_size[image,2048]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();
        $data['slug'] = url_title($data['name'], '-', true);
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;

        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads/doctors', $newName);
            $data['image'] = $newName;
        }

        $doctorModel->insert($data);

        return redirect()->to('admin/doctors')->with('success', 'Doctor added successfully');
    }

    public function edit($id)
    {
        $doctorModel = new DoctorModel();
        $doctor = $doctorModel->find($id);
        
        if (!$doctor) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $this->data['title'] = 'Edit Doctor: ' . $doctor['name'];
        $this->data['doctor'] = $doctor;
        return view('admin/doctors/form', $this->data);
    }

    public function update($id)
    {
        $doctorModel = new DoctorModel();
        $doctor = $doctorModel->find($id);

        $rules = [
            'name'      => 'required|min_length[3]',
            'specialty' => 'required',
            'image'     => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]|max_size[image,2048]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();
        $data['slug'] = url_title($data['name'], '-', true);
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;

        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            // Delete old image if exists
            if ($doctor['image'] && file_exists(ROOTPATH . 'public/uploads/doctors/' . $doctor['image'])) {
                unlink(ROOTPATH . 'public/uploads/doctors/' . $doctor['image']);
            }
            $newName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads/doctors', $newName);
            $data['image'] = $newName;
        }

        $doctorModel->update($id, $data);

        return redirect()->to('admin/doctors')->with('success', 'Doctor updated successfully');
    }

    public function delete($id)
    {
        $doctorModel = new DoctorModel();
        $doctor = $doctorModel->find($id);
        if ($doctor['image'] && file_exists(ROOTPATH . 'public/uploads/doctors/' . $doctor['image'])) {
            unlink(ROOTPATH . 'public/uploads/doctors/' . $doctor['image']);
        }
        $doctorModel->delete($id);
        return redirect()->to('admin/doctors')->with('success', 'Doctor deleted successfully');
    }
}
