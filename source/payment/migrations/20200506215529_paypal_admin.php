<?php

use Phinx\Migration\AbstractMigration;

class PaypalAdmin extends AbstractMigration
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
        $paypalAdminTable = $this->table('paypal_admin', ['id' => false, 'primary_key' => ['paypalid']]);
	$paypalAdminTable->addColumn('paypalid', 'integer', ['limit' => 11, 'identity' => true])
		->addColumn('email', 'string', ['limit' => 100])
		->addColumn('sandboxmode', 'integer', ['limit' => 2])
		->addColumn('transactionmethod', 'integer', ['limit' => 2])
		->create();
    }
}
