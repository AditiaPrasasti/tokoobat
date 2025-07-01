<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenerbitTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'penerbit_id' => [
                'type'           => 'INT',
                'constraint'     => 64,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_pb' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'kota' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
            ],
        ]);

        $this->forge->addKey('penerbit_id', true);
        $this->forge->createTable('tb_penerbit');
    }

    public function down()
    {
        $this->forge->dropTable('tb_penerbit');
    }
}
