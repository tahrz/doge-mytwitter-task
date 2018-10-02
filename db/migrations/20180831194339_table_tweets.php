<?php


use Phinx\Migration\AbstractMigration;

class TableTweets extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('tweets', ['id' => true, 'primary_key' => ['id']]);
        $table->addColumn('user_id', 'integer')
            ->addColumn('content', 'text')
            ->addTimestamps()
            ->create();
    }
}
