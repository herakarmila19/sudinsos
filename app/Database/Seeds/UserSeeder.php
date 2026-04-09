<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id' => 'VxAfCvmNZ88H6oWNMUgnGZpKLyIOc20Y7HNqJtgu8al8tAib5LIGz5tP7UYJTVRrnYi6XIc2SN1O8pYEjczLog~~',
            'nama' => 'Admin',
            'email' => '',
            'username' => 'admin',
            'password' => password_hash('admin_sudinsos', PASSWORD_DEFAULT),
            'status' => '1',
            'created_by' => '',
            'created_date' => '2024-06-13 15:00:00',
            'modified_by' => '',
            'modified_date' => '2024-06-13 15:00:00',
            'hak_akses' => 'Admin',
        ];

        $exists = $this->db->table('user')->where('username', $data['username'])->countAllResults();
        if ($exists === 0) {
            $this->db->table('user')->insert($data);
        }
    }
}
