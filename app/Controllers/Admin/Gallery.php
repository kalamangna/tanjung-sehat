<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GalleryModel;

class Gallery extends BaseController
{
    public function index()
    {
        $galleryModel = new GalleryModel();
        $this->data['title'] = 'Manajemen Galeri';
        $this->data['items'] = $galleryModel->findAll();
        return view('admin/gallery/index', $this->data);
    }

    public function create()
    {
        $galleryModel = new GalleryModel();
        
        $rules = [
            'title'    => 'required|min_length[3]',
            'category' => 'required|in_list[Fasilitas,Kegiatan]',
            'image'    => 'uploaded[image]|is_image[image]|max_size[image,2048]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $img = $this->request->getFile('image');
        
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads/gallery', $newName);
            
            $galleryModel->insert([
                'title'    => $this->request->getPost('title'),
                'category' => $this->request->getPost('category'),
                'image'    => $newName
            ]);
            
            log_activity('Unggah Galeri', 'Galeri', 'Mengunggah: ' . $this->request->getPost('title'));
            return redirect()->to('admin/gallery')->with('success', 'Foto berhasil diunggah.');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah foto.');
    }

    public function delete($id)
    {
        $galleryModel = new GalleryModel();
        $item = $galleryModel->find($id);
        if ($item['image'] && file_exists(ROOTPATH . 'public/uploads/gallery/' . $item['image'])) {
            unlink(ROOTPATH . 'public/uploads/gallery/' . $item['image']);
        }
        $galleryModel->delete($id);
        log_activity('Hapus Galeri', 'Galeri', 'Menghapus ID: ' . $id);
        return redirect()->to('admin/gallery')->with('success', 'Foto berhasil dihapus.');
    }
}