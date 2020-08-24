<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CostumorPayment extends AbstractMigration
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
        $table = $this->table('costumors_payments', ['id' => false, 'primary_key' => ['transactionid']]);
	    $table->addColumn('transactionid', 'integer', ['limit' => 11, 'identity' => true])
        ->addColumn('transactionmethod', 'integer', ['limit' => 2, 'null' => true, 'default' => 1])
        ->addColumn('costumorid', 'integer', ['limit' => 11, 'null' => false])
        ->addColumn('amount', 'decimal', ['precision' => 10, 'scale' => 2, 'null' => true, 'default' => 0.00])
        ->addColumn('tax_total', 'decimal', ['precision' => 10, 'scale' => 2, 'null' => true, 'default' => 0.00])
        ->addColumn('currencycode', 'string', ['limit' => 10, 'null' => false])
        ->addColumn('transactioncode', 'integer', ['limit' => 11, 'null' => false])
		->addColumn('transactiondate', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
        ->addColumn('paymentmethod', 'integer', ['limit' => 11, 'null' => false])
        ->addColumn('paymenttransaction', 'integer', ['limit' => 11, 'null' => false])
        ->addColumn('shippingid', 'integer', ['limit' => 11, 'null' => false])
        ->addColumn('payment_status', 'string', ['limit' => 40, 'null' => true])
        ->addColumn('status', 'integer', ['limit' => 2, 'null' => true, 'default' => 1])
		->create();
    }
}
