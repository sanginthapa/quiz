<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class QuizQuestions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'question_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'question' => [
                'type' => 'TEXT',
                'null' => false,
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
        $this->forge->addKey('question_id', true);
        $this->forge->createTable('quiz_questions');
    }

    public function down()
    {
        $this->forge->dropTable('quiz_questions');
    }
}
