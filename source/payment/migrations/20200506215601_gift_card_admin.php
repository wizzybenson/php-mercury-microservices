<?php

use Phinx\Migration\AbstractMigration;

class GiftCardAdmin extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $giftTable = $this->table('gift_card_admin', ['id' => false, 'primary_key' => ['giftcardid']]);
	$giftTable->addColumn('giftcardid', 'integer', ['limit' => 11, 'identity' => true])
		->addColumn('title', 'string', ['limit' => 100, 'null' => false])
		->addColumn('description', 'string', ['limit' => 225, 'null' => true])
		->addColumn('code', 'string', ['limit' => 100, 'null' => false])
		->addColumn('expirencedate', 'date', ['null' => false])
		->addColumn('bound', 'integer', ['limit' => 10, 'null' => false, 'default' => 0])
		->addColumn('used', 'integer', ['limit' => 10, 'null' => false, 'default' => 0])
		->addColumn('status', 'integer', ['limit' => 2, 'null' => false, 'default' => 0])
		->create();
    }
}
