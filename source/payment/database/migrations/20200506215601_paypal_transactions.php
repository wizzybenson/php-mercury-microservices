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
        $giftTable = $this->table('paypal_transactions', ['id' => false, 'primary_key' => ['paypaltransactionid']]);
	    $giftTable->addColumn('paypaltransactionid', 'integer', ['limit' => 11, 'identity' => true])
        ->addColumn('captureid', 'string', ['limit' => 50, 'null' => false])
        ->addColumn('shippingname', 'string', ['limit' => 50, 'null' => false])
        ->addColumn('shippingadress', 'string', ['limit' => 100, 'null' => false])
        ->addColumn('paymentcaptureid', 'string', ['limit' => 50, 'null' => false])
        ->addColumn('currencycode', 'string', ['limit' => 50, 'null' => false])
        ->addColumn('amountvalue', 'decimal', ['precision' => 10, 'scale' => 2, 'null' => false])
        ->addColumn('paypalfee', 'decimal', ['precision' => 10, 'scale' => 2, 'null' => false])
		->addColumn('createtime', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
        ->addColumn('payerid', 'string', ['limit' => 50, 'null' => false])
		->addColumn('payeremail', 'string', ['limit' => 50, 'null' => false])
		->create();
    }
}
?>
