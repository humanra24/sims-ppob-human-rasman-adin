<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateServiceTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'service_code' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'service_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'service_icon' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'service_tariff' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => '0.00',
            ],
            // Tambahkan kolom lainnya jika diperlukan
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('services');
    }

    public function down()
    {
        $this->forge->dropTable('services');
    }
}
