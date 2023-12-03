<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TopUpController extends BaseController
{
    public function index()
    {
        $data = [
            'title'     => 'Top Up',
            'balance'   => $this->getResponse('balance', 'GET')['data']->data->balance,
            'profile'   => $this->getResponse('profile', 'GET')['data']->data,
        ];

        if ($this->request->is('post')) {
            if (!$this->validate([
                'nominal'  => 'required|numeric',
            ])) {
                $data['errors'] = $this->validator->getErrors();
                $data['old_data'] = $this->request->getPost();
            } else {
                $formData = [
                    "top_up_amount" => $this->request->getPost('nominal')
                ];

                $response = $this->getResponse('topup', 'POST', $formData);

                if ($response['code'] == 200) {
                    $this->session->setFlashdata('success', $response['data']->message);
                    return redirect()->to(base_url("/"));
                } else {
                    $this->session->setFlashdata('error', $response['data']->message);
                    return redirect()->to(base_url("/"));
                }
            }
        }

        return view('pages/top-up', $data);
    }
}
