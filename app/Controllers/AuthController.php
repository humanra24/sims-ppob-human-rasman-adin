<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function register()
    {
        $data = [
            'title'         => 'Registrasi',
        ];
        if ($this->request->is('post')) {
            if (!$this->validate([
                'email'                 => 'required|valid_email',
                'nama_depan'            => 'required',
                'nama_belakang'         => 'required',
                'password'              => 'required|min_length[8]',
                'konfirmasi_password'   => 'required|matches[password]'
            ])) {
                $data['errors'] = $this->validator->getErrors();
                $data['old_data'] = $this->request->getPost();
            } else {
                $formData = [
                    'email'         => $this->request->getPost('email'),
                    'first_name'    => $this->request->getPost('nama_depan'),
                    'last_name'    => $this->request->getPost('nama_depan'),
                    'password'      => $this->request->getPost('password')
                ];

                $response = $this->getResponse('registration', 'POST', $formData);

                if ($response['code'] == 200) {
                    $this->session->setFlashdata('success', 'Registrasi berhasil. Silahkan Login!');
                    return redirect()->to(base_url('/login'));
                } else {
                    $data['errors']['failed'] = $response['data']->message;
                }
            }
        }

        return view('pages/auth/register', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'Masuk'
        ];

        if ($this->request->is('post')) {
            if (!$this->validate([
                'email'                 => 'required|valid_email',
                'password'              => 'required',
            ])) {
                $data['errors'] = $this->validator->getErrors();
                $data['old_data'] = $this->request->getPost();
            } else {
                $formData = array(
                    'email'    => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password')
                );

                $response = $this->getResponse('login', 'POST', $formData);

                if ($response['code'] == 200) {
                    $this->session->set('token', $response['data']->data->token);
                    return redirect()->to(base_url('/'));
                } else {
                    $data['errors']['failed'] = "Email dan password salah";
                }
            }
        }

        return view('pages/auth/login', $data);
    }

    public function logout()
    {
        $this->session->destroy();

        return redirect()->to(base_url('/login'));
    }
}
