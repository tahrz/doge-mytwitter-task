<?php

use Phinx\Migration\AbstractMigration;

class TableUsers extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('users', ['id' => true, 'primary_key' => ['id']]);
        $table->addColumn('id', integer)
            ->addColumn('email', varchar, ['limit' => 255])
            ->addColumn('password', varchar, ['limit' => 255])
            ->addColumn('avatar', varchar, ['limit' => 255, 'default' => null])
            ->addColumn('about', varchar, ['limit' => 255, 'default' => null])
            ->addColumn('name', varchar, ['limit' => 255, 'default' => null])
            ->addColumn('ip', varchar, ['limit' => 255, 'default' => null])
            ->addColumn('registered', integer)
            ->addColumn('last_login', integer)
            ->create();
    }
}
