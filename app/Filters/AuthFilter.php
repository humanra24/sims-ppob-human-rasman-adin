<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Mendapatkan layanan sesi
        $session = session();

        // Cek apakah pengguna sudah login
        if (!$session->get('token')) {
            // Jika pengguna belum login, arahkan ke halaman login
            return redirect()->to(base_url('/login'));
        }

        return;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada tindakan yang dilakukan setelah request
    }
}
