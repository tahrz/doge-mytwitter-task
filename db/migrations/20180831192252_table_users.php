<?php

use Phinx\Migration\AbstractMigration;

class TableUsers extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('users', ['id' => true, 'primary_key' => ['id']]);
        $table->addColumn('email', 'string', ['limit' => 255])
            ->addColumn('password', 'string', ['limit' => 255])
            ->addColumn('avatar', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('about', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('name', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('login', 'string', ['limit' => 255])
            ->create();
    }
}
