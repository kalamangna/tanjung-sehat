<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;

class Settings extends BaseController
{
    public function index()
    {
        $this->data['title'] = 'Pengaturan Website';
        return view('admin/settings', $this->data);
    }

    public function update()
    {
        $settingModel = new SettingModel();
        $settings = $this->request->getPost('settings');

        foreach ($settings as $key => $value) {
            $settingModel->where('key', $key)->set(['value' => $value])->update();
        }

        log_activity('Update Pengaturan', 'Pengaturan', 'Memperbarui konfigurasi situs');

        return redirect()->to('admin/settings')->with('success', 'Pengaturan berhasil diperbarui');
    }
}
