<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $data = [
            [
                'id_menu'       => '20240101000006',
                'url'           => 'profil/struktur-organisasi',
                'judul'         => 'Profil - Struktur Organisasi',
                'deskripsi'     => 'Struktur Organisasi',
                'isi_konten'    => '',
                'penulis'       => 'Admin',
                'thumbnail'     => null,
                'created_by'    => 'Admin',
                'created_date'  => $now,
                'modified_by'   => null,
                'modified_date' => null,
                'publish'       => '1',
                'publish_date'  => $now,
                'status'        => '1',
                'pembaca'       => 0,
            ],
            [
                'id_menu'       => '20240101000007',
                'url'           => 'profil/tugas-fungsi',
                'judul'         => 'Profil - Tugas dan Fungsi',
                'deskripsi'     => 'Tugas dan Fungsi',
                'isi_konten'    => '',
                'penulis'       => 'Admin',
                'thumbnail'     => null,
                'created_by'    => 'Admin',
                'created_date'  => $now,
                'modified_by'   => null,
                'modified_date' => null,
                'publish'       => '1',
                'publish_date'  => $now,
                'status'        => '1',
                'pembaca'       => 0,
            ],
            [
                'id_menu'       => '20240101000008',
                'url'           => 'profil/kinerja',
                'judul'         => 'Profil - Kinerja',
                'deskripsi'     => 'Kinerja Suku Dinas',
                'isi_konten'    => '',
                'penulis'       => 'Admin',
                'thumbnail'     => null,
                'created_by'    => 'Admin',
                'created_date'  => $now,
                'modified_by'   => null,
                'modified_date' => null,
                'publish'       => '1',
                'publish_date'  => $now,
                'status'        => '1',
                'pembaca'       => 0,
            ],
            [
                'id_menu'       => '20240101000009',
                'url'           => 'seksi/tata-usaha',
                'judul'         => 'Seksi - Tata Usaha',
                'deskripsi'     => 'Tata Usaha',
                'isi_konten'    => '',
                'penulis'       => 'Admin',
                'thumbnail'     => null,
                'created_by'    => 'Admin',
                'created_date'  => $now,
                'modified_by'   => null,
                'modified_date' => null,
                'publish'       => '1',
                'publish_date'  => $now,
                'status'        => '1',
                'pembaca'       => 0,
            ],
            [
                'id_menu'       => '20240101000010',
                'url'           => 'seksi/komunikasi-informasi-publik',
                'judul'         => 'Seksi - Komunikasi dan Informasi Publik',
                'deskripsi'     => 'Komunikasi dan Informasi Publik',
                'isi_konten'    => '',
                'penulis'       => 'Admin',
                'thumbnail'     => null,
                'created_by'    => 'Admin',
                'created_date'  => $now,
                'modified_by'   => null,
                'modified_date' => null,
                'publish'       => '1',
                'publish_date'  => $now,
                'status'        => '1',
                'pembaca'       => 0,
            ],
            [
                'id_menu'       => '20240101000011',
                'url'           => 'seksi/aplikasi-siber-statistik',
                'judul'         => 'Seksi - Aplikasi, Siber dan Statistik',
                'deskripsi'     => 'Aplikasi, Siber dan Statistik',
                'isi_konten'    => '',
                'penulis'       => 'Admin',
                'thumbnail'     => null,
                'created_by'    => 'Admin',
                'created_date'  => $now,
                'modified_by'   => null,
                'modified_date' => null,
                'publish'       => '1',
                'publish_date'  => $now,
                'status'        => '1',
                'pembaca'       => 0,
            ],
            [
                'id_menu'       => '20240101000012',
                'url'           => 'seksi/infrastruktur-digital',
                'judul'         => 'Seksi - Infrastruktur Digital',
                'deskripsi'     => 'Infrastruktur Digital',
                'isi_konten'    => '',
                'penulis'       => 'Admin',
                'thumbnail'     => null,
                'created_by'    => 'Admin',
                'created_date'  => $now,
                'modified_by'   => null,
                'modified_date' => null,
                'publish'       => '1',
                'publish_date'  => $now,
                'status'        => '1',
                'pembaca'       => 0,
            ]
        ];

        foreach ($data as $row) {
            // Insert atau update jika sudah ada
            $exists = $this->db->table('menu')->where('judul', $row['judul'])->countAllResults();
            if ($exists === 0) {
                $this->db->table('menu')->insert($row);
            } else {
                $this->db->table('menu')->where('judul', $row['judul'])->update($row);
            }
        }
    }
}
