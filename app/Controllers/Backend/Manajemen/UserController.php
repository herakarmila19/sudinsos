<?php

namespace App\Controllers\Backend\Manajemen;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use Config\Services;

class UserController extends BaseController
{
    protected $custom, $validation;

    public function __construct()
    {
        $this->custom = new CustomModel();
        $this->validation = Services::validation();
    }

    public function login()
    {
        if (session()->get('logged_in')) {
            if ($_SESSION['hak_akses'] == 'Admin') {
                return redirect()->to('admin/dashboard');
            } else {
                return redirect()->to('kecamatan');
            }
        }

        return view('backend/manajemen/user/login');
    }

    public function auth()
    {
        $captcha_code = $this->request->getVar('captcha_code');
        $captcha_confirm = $this->request->getVar('captcha_confirm');

        if ($captcha_code === $captcha_confirm) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $data = $this->custom->whereCustom('user', 'username', $username);

            if (!empty($data) && $data->username == $this->request->getVar('username')) {
                $password_db = $data->password;
                $verify_pass = password_verify($password, $password_db);
                if ($verify_pass) {
                    $userData = [
                        'id' => $data->id,
                        'nama' => $data->nama,
                        'username' => $data->username,
                        'hak_akses' => $data->hak_akses,
                        'logged_in' => TRUE
                    ];

                    if ($data->hak_akses == 'Admin') {
                        session()->set($userData);
                        return redirect()->to('admin/dashboard');
                    } else {
                        session()->set($userData);
                        return redirect()->to('kecamatan');
                    }
                }
                else {
                    session()->setFlashdata('pesan', 'Gagal Login Password Salah');
                    return redirect()->to('auth/login');
                }
            } else {
                session()->setFlashdata('pesan', 'Gagal Login Username Salah');
                return redirect()->to('auth/login');
            }
        } else {
            session()->setFlashdata('pesan', 'Gagal Login Captcha Salah');
            return redirect()->to('auth/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('');
    }

    public function index()
    {
        $data = [
            'userData' => $this->custom->findAllWhereCustom('user', 'created_date', 'desc', 'status', 1)
        ];

        return view('backend/manajemen/user/index', $data);
    }

    public function new()
    {
        $data = [
            'validation' => $this->validation,
        ];

        return view('backend/manajemen/user/new', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'hak_akses' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'password_confirm' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi',
                    'matches' => 'Password Tidak Sama'
                ]
            ],
        ])) {
            return redirect()->to('admin/user/new')->withInput();
        }

        $this->custom->insertCustom(
            'user',
            [
                'id' => date("YmdHis"),
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                "status" => 1,
                "created_by" => $_SESSION['id'],
                "created_date" => date("Y-m-d H:i:s"),
                "hak_akses" => $this->request->getVar('hak_akses'),
            ]
        );

        session()->setFlashdata('pesan_tambah', 'Data Video Berhasil Ditambah');

        return redirect()->to('admin/user');
    }

    public function show($id)
    {
        $data = [
            'userData' => $this->custom->whereCustom('user', 'id', $id)
        ];

        return view('backend/manajemen/user/show', $data);
    }

    public function edit($id)
    {
        $data = [
            'userData' => $this->custom->whereCustom('user', 'id', $id),
            'validation' => $this->validation
        ];

        return view('backend/manajemen/user/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'hak_akses' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'password_confirm' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Password Tidak Sama'
                ]
            ],
        ])) {
            return redirect()->to('admin/user/' . $id . '/edit')->withInput();
        }

        if (!empty($this->request->getVar('password'))) {
            $this->custom->updateCustom('user', 'id', $id, [
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'modified_by' => $_SESSION['id'],
                'modified_date' => date("Y-m-d H:i:s"),
                "hak_akses" => $this->request->getVar('hak_akses'),
            ]);
        } else {
            $this->custom->updateCustom('user', 'id', $id, [
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'username' => $this->request->getVar('username'),
                'modified_by' => $_SESSION['id'],
                'modified_date' => date("Y-m-d H:i:s"),
                "hak_akses" => $this->request->getVar('hak_akses'),
            ]);
        }

        session()->setFlashdata('pesan_ubah', 'Data Video Berhasil Diubah');

        return redirect()->to('admin/user');
    }

    public function delete($id)
    {
        $this->custom->updateCustom('user', 'id', $id, [
            'status' => 0
        ]);

        session()->setFlashdata('pesan_hapus', 'Data Video Berhasil Dihapus');

        return redirect()->to('admin/user');
    }
}