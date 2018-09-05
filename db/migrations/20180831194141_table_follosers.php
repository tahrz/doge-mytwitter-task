<?php


use Phinx\Migration\AbstractMigration;

class TableFollosers extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('followers', ['id' => false]);
        $table->addColumn('user_id', 'integer')
            ->addColumn('follows_user_id', 'integer')
            ->create();
    }
}
