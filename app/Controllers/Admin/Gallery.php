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
        $img = $this->request->getFile('image');
        
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads/gallery', $newName);
            
            $galleryModel->insert([
                'title'    => $this->request->getPost('title'),
                'category' => $this->request->getPost('category'),
                'image'    => $newName
            ]);
            
            log_activity('Upload Gallery', 'Gallery', 'Uploaded: ' . $newName);
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
        log_activity('Delete Gallery', 'Gallery', 'Deleted ID: ' . $id);
        return redirect()->to('admin/gallery')->with('success', 'Foto berhasil dihapus.');
    }
}