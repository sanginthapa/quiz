<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OptionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'option_id'=>[
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'question_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true
            ],
            'option_name'=>[
                'type'=>'TEXT',
                'null'=>false
            ],
            'is_correct' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addkey('option_id',true);
        $this->forge->addForeignKey('question_id','quiz_questions','question_id');
        $this->forge->createTable('options_table');
    }

    public function down()
    {
        $this->forge->dropTable('options_table');
    }
}
