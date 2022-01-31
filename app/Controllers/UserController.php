<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $users = (new UserModel())->findAll();
        return view('user/index', [
            'title' => 'Users',
            'users' => $users,
        ]);
    }

    public function tambah()
    {
        return view('user/tambah', ['title' => 'Tambah User']);
    }

    public function edit($id)
    {
        $user = (new UserModel())->find($id);
        return view('user/edit', ['title' => 'Edit User', 'user' => $user]);
    }

    public function simpan()
    {
        $validation = $this->validate([
            'nama_lengkap' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_konfirmasi' => 'required|matches[password]',
            'status' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'ktp' => 'uploaded[ktp]',
        ]);

        if ($validation) {
            $user = new UserModel();
            $user->insert([
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'status' => $this->request->getPost('status'),
                'jabatan' => $this->request->getPost('jabatan'),
                'alamat' => $this->request->getPost('alamat'),
                'no_telp' => $this->request->getPost('no_telp'),
                'ktp' => base64_encode(file_get_contents($this->request->getFile('ktp'))),
            ]);

            return redirect('users')
                ->with('message-type', 'success')
                ->with('message-text', 'User baru berhasil ditambahkan.');
        }

        return redirect('users/tambah')->withInput()->with('validation', $this->validator);
    }

    public function update()
    {
        $validation = $this->validate([
            'nama_lengkap' => 'required',
            'email' => 'required',
            'status' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'ktp' => 'uploaded[ktp]',
        ]);

        if ($validation) {
            $user = new UserModel();

            if ($this->request->getPost('password')) {
                $this->validate([
                    'password' => 'required',
                    'password_konfirmasi' => 'required|matches[password]',
                ]);
                $user->update($this->request->getPost('id'), [
                    'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                    'email' => $this->request->getPost('email'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'status' => $this->request->getPost('status'),
                    'jabatan' => $this->request->getPost('jabatan'),
                    'alamat' => $this->request->getPost('alamat'),
                    'no_telp' => $this->request->getPost('no_telp'),
                    'ktp' => base64_encode(file_get_contents($this->request->getFile('ktp'))),
                ]);
            } else {
                $user->update($this->request->getPost('id'), [
                    'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                    'email' => $this->request->getPost('email'),
                    'status' => $this->request->getPost('status'),
                    'jabatan' => $this->request->getPost('jabatan'),
                    'alamat' => $this->request->getPost('alamat'),
                    'no_telp' => $this->request->getPost('no_telp'),
                    'ktp' => base64_encode(file_get_contents($this->request->getFile('ktp'))),
                ]);
            }

            return redirect('users')
                ->with('message-type', 'success')
                ->with('message-text', 'User telah berhasil diperbarui.');
        }

        $route = 'users/edit/' . $this->request->getPost('id');
        return redirect()->to(site_url($route))->withInput()->with('validation', $this->validator);
    }

    public function hapus($id)
    {
        (new UserModel())->delete($id);
        return redirect('users')
            ->with('message-type', 'success')
            ->with('message-text', 'User telah berhasil dihapus.');
    }

}