<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVisiMisiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'nama' => ['type' => 'VARCHAR', 'constraint' => 100],
            'jabatan' => ['type' => 'VARCHAR', 'constraint' => 100],
            'visi_misi' => ['type' => 'TEXT'],
            'gambar' => ['type' => 'TEXT'],
            'status' => ['type' => 'INT', 'constraint' => 11],
            'created_date' => ['type' => 'DATETIME'],
            'modified_date' => ['type' => 'DATETIME'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('visi_misi');
    }

    public function down()
    {
        $this->forge->dropTable('visi_misi', true);
    }
}
