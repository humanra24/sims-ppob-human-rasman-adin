<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function getData($table)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($table);

        $query = $builder->get();

        return $query->getResultArray();
    }

    public function index(): string
    {
        $data = [
            'title'     => 'Dashboard',
            'services'  => $this->getData('services'),
            'banners'   => $this->getData('banners'),
            'balance'   => $this->getResponse('balance', 'GET')['data']->data->balance,
            'profile'   => $this->getResponse('profile', 'GET')['data']->data,
        ];

        return view('pages/dashboard', $data);
    }
}
