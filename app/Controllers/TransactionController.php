<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TransactionController extends BaseController
{
    public function index(): string
    {
        $data = [
            'title'         => 'Transaction',
            'balance'       => $this->getResponse('balance', 'GET')['data']->data->balance,
            'profile'       => $this->getResponse('profile', 'GET')['data']->data,
            'transactions'  => $this->getResponse("transaction/history", 'GET')['data']->data->records,
        ];


        return view('pages/transaction', $data);
    }

    public function getTransactionHistory()
    {
        $request = service('request');
        $limit = $request->getGet('limit');
        $offset = $request->getGet('offset');
        $response = $this->getResponse("transaction/history?limit=$limit&&offset=$offset", 'GET')['data']->data->records;
        return $this->response->setJSON($response);
    }
}
