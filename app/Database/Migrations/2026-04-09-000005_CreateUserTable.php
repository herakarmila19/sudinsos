<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'VARCHAR', 'constraint' => 255],
            'nama' => ['type' => 'VARCHAR', 'constraint' => 100],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100],
            'username' => ['type' => 'VARCHAR', 'constraint' => 100],
            'password' => ['type' => 'TEXT'],
            'status' => ['type' => 'VARCHAR', 'constraint' => 1, 'comment' => '1=aktif,0=tdk_aktif'],
            'created_by' => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_date' => ['type' => 'DATETIME', 'null' => true],
            'modified_by' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'modified_date' => ['type' => 'DATETIME', 'null' => true],
            'hak_akses' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user', true);
    }
}
