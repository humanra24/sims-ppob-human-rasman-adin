<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CURLFile;

class ProfileController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'profile'   => $this->getResponse('profile', 'GET')['data']->data,
        ];

        return view('pages/profile/index', $data);
    }

    public function edit()
    {
        if ($this->request->is('put')) {
            $formData = [
                "first_name" => $this->request->getPost('nama_depan'),
                "last_name" => $this->request->getPost('nama_belakang'),
            ];
            $response = $this->getResponse('profile/update', 'PUT', $formData);
            if ($response['code'] == 200) {
                $this->session->setFlashdata('success', $response['data']->message);
                return redirect()->to(base_url("/profile"));
            } else {
                $this->session->setFlashdata('error', $response['data']->message);
                return redirect()->to(base_url("/profile"));
            }
        }

        $data = [
            'title' => 'Dashboard',
            'profile'   => $this->getResponse('profile', 'GET')['data']->data,
        ];

        return view('pages/profile/edit', $data);
    }

    public function editImageProfile()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'gambar' => 'uploaded[gambar]|ext_in[gambar,png,jpg,jpeg]|max_size[gambar,1024]'
        ]);

        $file = $this->request->getFile('gambar');

        if (!$validation->run(['gambar' => $file])) {
            $errors = $validation->getErrors();
            foreach ($errors as $error) {
                $this->session->setFlashdata('error', $error);
                return redirect()->to(base_url("/profile/edit"));
            }
        } else {
            $formData = [
                'file' => new CURLFile($file->getRealPath(), $file->getMimeType(), $file->getName())
            ];
            $response = $this->getResponse('profile/image', 'PUT', $formData, true);
            if ($response['code'] == 200) {
                $this->session->setFlashdata('success', $response['data']->message);
                return redirect()->to(base_url("/profile/edit"));
            } else {
                dd($response);
                $this->session->setFlashdata('error', $response['data']->message);
                return redirect()->to(base_url("/profile/edit"));
            }
        }
    }
}
