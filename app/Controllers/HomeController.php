<?php

namespace App\Controllers;

use App\Models\UserModel;

class HomeController extends BaseController
{
//    public function __construct()
//    {
//        $this->validator = \Config\Services::validation();
//    }

    public function index()
    {
        return view('home/index');
    }

    public function login()
    {
        return view('home/login', ['title' => 'Login']);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    public function daftar()
    {
        return view('home/daftar', ['title' => 'Daftar']);
    }

    public function prosesDaftar()
    {
        $validation = $this->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'password_konfirmasi' => 'required|matches[password]',
        ]);

        if ($validation) {
            $user = new UserModel();
            $hashPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
            try {
                $user->insert([
                    'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                    'email' => $this->request->getPost('email'),
                    'password' => $hashPassword,
                    'status' => 0,
                    'jabatan' => 'Pelapor'
                ]);
            } catch (\ReflectionException $e) {}
            return redirect('login');
        }
        return redirect('daftar')->withInput()->with('validation', $this->validator);
    }

    public function prosesLogin()
    {
        $validation = $this->validate([
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]',
        ]);

        if ($validation) {
            $userModel = new UserModel();
            $user = $userModel
                ->where('email', $this->request->getPost('email'))
                ->first();
            if (!$user) return redirect('login')->withInput()
                ->with('validation', $this->validator)
                ->with('error_message', 'Email tidak ditemukan.');

            $isValidPassword = password_verify($this->request->getPost('password'), $user->password);

            if (!$isValidPassword) return redirect('login')->withInput()
                ->with('validation', $this->validator)
                ->with('error_message', 'Password tidak sesuai.');

            if ($user->status != 1) return redirect('login')->withInput()
                ->with('validation', $this->validator)
                ->with('error_message', 'User tidak aktif.');

            // set login session
            $userData = [
                'id' => $user->id,
                'email' => $user->email,
                'nama_lengkap' => $user->nama_lengkap,
                'jabatan' => $user->jabatan,
                'aktif' => $user->status == 1 ? 'Aktif' : 'Tidak Aktif'
            ];

            session()->set('user', $userData);

            return redirect('dashboard');
        }

        return redirect('login')->withInput()->with('validation', $this->validator);
    }
}
