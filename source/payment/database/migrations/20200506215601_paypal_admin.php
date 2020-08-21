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
        $giftTable = $this->table('paypal_admin', ['id' => false, 'primary_key' => ['paypalid']]);
	    $giftTable->addColumn('paypalid', 'integer', ['limit' => 11, 'identity' => true])
        ->addColumn('email', 'string', ['limit' => 100, 'null' => false])
        ->addColumn('clientid', 'string', ['limit' => 225, 'null' => true])
        ->addColumn('clientsecret', 'string', ['limit' => 225, 'null' => true])
		->addColumn('sandboxmode', 'integer', ['limit' => 2, 'null' => false])
		->addColumn('transactionmethod', 'integer', ['limit' => 2, 'null' => false])
		->create();
    }
}
?>
