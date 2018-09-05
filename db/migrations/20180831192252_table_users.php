<?php

use Phinx\Migration\AbstractMigration;

class TableUsers extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('users', ['id' => true, 'primary_key' => ['id']]);
        $table->addColumn('email', 'string', ['limit' => 255])
            ->addColumn('password', 'string', ['limit' => 255])
            ->addColumn('avatar', 'string', ['limit' => 255, 'default' => null])
            ->addColumn('about', 'string', ['limit' => 255, 'default' => null])
            ->addColumn('name', 'string', ['limit' => 255, 'default' => null])
            ->addColumn('ip', 'string', ['limit' => 255, 'default' => null])
            ->addColumn('registered', 'integer')
            ->addColumn('last_login', 'integer')
            ->create();
    }
}
