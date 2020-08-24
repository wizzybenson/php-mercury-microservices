<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class PaypalTransaction extends AbstractMigration
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
        $table = $this->table('paypal_transactions', ['id' => false, 'primary_key' => ['paypaltransactionid']]);
	    $table->addColumn('paypaltransactionid', 'integer', ['limit' => 11, 'identity' => true])
        ->addColumn('captureid', 'string', ['limit' => 50, 'null' => false])
        ->addColumn('paymentcaptureid', 'string', ['limit' => 50, 'null' => false])
        ->addColumn('currencycode', 'string', ['limit' => 10, 'null' => false])
        ->addColumn('amountvalue', 'decimal', ['precision' => 10, 'scale' => 2, 'null' => true, 'default' => 0.00])
        ->addColumn('paypalfee', 'decimal', ['precision' => 10, 'scale' => 2, 'null' => true, 'default' => 0.00])
		->addColumn('createtime', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
        ->addColumn('payerid', 'integer', ['limit' => 11, 'null' => false])
		->addColumn('paypal_id', 'integer', ['limit' => 11, 'null' => false])
		->create();
    }
}
