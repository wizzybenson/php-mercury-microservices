<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class GiftCardAdmin extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('gift_card_admin', ['id' => false, 'primary_key' => ['giftcardid']]);
	    $table->addColumn('giftcardid', 'integer', ['limit' => 11, 'identity' => true])
        ->addColumn('title', 'string', ['limit' => 100, 'null' => false])
        ->addColumn('code', 'string', ['limit' => 100, 'null' => false])
		->addColumn('description', 'string', ['limit' => 255, 'null' => true])
		->addColumn('ladate', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
		->addColumn('expiration_date', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
		->addColumn('max_use', 'integer', ['limit' => 10, 'null' => false, 'default' => 0])
		->addColumn('used', 'integer', ['limit' => 10, 'null' => true, 'default' => 0])
		->addColumn('status', 'integer', ['limit' => 2, 'null' => false])
		->create();
    }
}
