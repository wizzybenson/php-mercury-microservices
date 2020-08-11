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
        $giftTable = $this->table('costumors_payments', ['id' => false, 'primary_key' => ['transactionid']]);
	    $giftTable->addColumn('transactionid', 'integer', ['limit' => 11, 'identity' => true])
        ->addColumn('costumorid', 'integer', ['limit' => 11, 'null' => false])
        ->addColumn('amount', 'integer', ['limit' => 11, 'null' => false])
        ->addColumn('transactioncode', 'integer', ['limit' => 11, 'null' => false])
		->addColumn('transactiondate', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
        ->addColumn('paymentmethod', 'integer', ['limit' => 11, 'null' => false])
        ->addColumn('paymenttransaction', 'integer', ['limit' => 11, 'null' => false])
		->create();
    }
}
?>
