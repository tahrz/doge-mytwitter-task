<?php

use Phinx\Migration\AbstractMigration;

class TableFollowers extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('followers', ['id' => true]);
        $table->addColumn('subscriber_id', 'integer')
            ->addColumn('subscription_id', 'integer')
            ->addTimestamps()
            ->create();
    }
}
