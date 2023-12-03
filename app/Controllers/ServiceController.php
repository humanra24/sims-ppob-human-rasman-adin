<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class ServiceController extends BaseController
{
    public function getDataByServiceCode($code)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('services');

        $query = $builder->getWhere(['service_code' => $code]);

        return $query->getResultArray();
    }

    public function index()
    {
        $request = \Config\Services::request();
        $service_code = strtoupper($request->uri->getSegment(2));
        $service = $this->getDataByServiceCode($service_code);
        if (count($service)) {
            if ($this->request->is('post')) {
                $formData = [
                    "service_code" => $service_code
                ];
                $response = $this->getResponse('transaction', 'POST', $formData);
                if ($response['code'] == 200) {
                    $this->session->setFlashdata('success', $response['data']->message);
                    return redirect()->to(base_url("/"));
                } else {
                    $this->session->setFlashdata('error', $response['data']->message);
                    return redirect()->to(base_url("/service/" . $request->uri->getSegment(2)));
                }
            }

            $data = [
                'title' => 'Service',
                'service' => $service[0],
                'balance'   => $this->getResponse('balance', 'GET')['data']->data->balance,
                'profile'   => $this->getResponse('profile', 'GET')['data']->data,
            ];
            return view('pages/service', $data);
        }
        throw new PageNotFoundException('Halaman tidak ditemukan.');
    }
}
