<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogModel;
use App\Models\BlogCategoryModel;

class Blog extends BaseController
{
    public function index()
    {
        $blogModel = new BlogModel();
        $this->data['title'] = 'Manage Blog Posts';
        $this->data['blogs'] = $blogModel->getWithCategory();
        return view('admin/blog/index', $this->data);
    }

    public function new()
    {
        $catModel = new BlogCategoryModel();
        $this->data['title'] = 'Create New Post';
        $this->data['categories'] = $catModel->findAll();
        return view('admin/blog/form', $this->data);
    }

    public function create()
    {
        $blogModel = new BlogModel();
        $rules = [
            'title'       => 'required|min_length[5]',
            'category_id' => 'required',
            'summary'     => 'required',
            'content'     => 'required',
            'image'       => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]|max_size[image,3072]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();
        $data['slug'] = url_title($data['title'], '-', true);
        
        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads/blog', $newName);
            $data['image'] = $newName;
        }

        $blogModel->insert($data);
        return redirect()->to('admin/blog')->with('success', 'Post published successfully');
    }

    public function edit($id)
    {
        $blogModel = new BlogModel();
        $catModel = new BlogCategoryModel();
        $blog = $blogModel->find($id);
        
        if (!$blog) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $this->data['title'] = 'Edit Post';
        $this->data['blog'] = $blog;
        $this->data['categories'] = $catModel->findAll();
        return view('admin/blog/form', $this->data);
    }

    public function update($id)
    {
        $blogModel = new BlogModel();
        $blog = $blogModel->find($id);

        $rules = [
            'title'       => 'required|min_length[5]',
            'category_id' => 'required',
            'summary'     => 'required',
            'content'     => 'required',
            'image'       => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]|max_size[image,3072]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();
        $data['slug'] = url_title($data['title'], '-', true);
        
        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            if ($blog['image'] && file_exists(ROOTPATH . 'public/uploads/blog/' . $blog['image'])) {
                unlink(ROOTPATH . 'public/uploads/blog/' . $blog['image']);
            }
            $newName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads/blog', $newName);
            $data['image'] = $newName;
        }

        $blogModel->update($id, $data);
        return redirect()->to('admin/blog')->with('success', 'Post updated successfully');
    }

    public function delete($id)
    {
        $blogModel = new BlogModel();
        $blog = $blogModel->find($id);
        if ($blog['image'] && file_exists(ROOTPATH . 'public/uploads/blog/' . $blog['image'])) {
            unlink(ROOTPATH . 'public/uploads/blog/' . $blog['image']);
        }
        $blogModel->delete($id);
        return redirect()->to('admin/blog')->with('success', 'Post deleted successfully');
    }
}
