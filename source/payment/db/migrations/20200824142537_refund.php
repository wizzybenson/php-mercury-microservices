<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Refund extends AbstractMigration
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
        $table = $this->table('refunds', ['id' => false, 'primary_key' => ['refundid']]);
        $table->addColumn('refundid', 'integer', ['limit' => 11, 'identity' => true])
        ->addColumn('amount', 'decimal', ['precision' => 10, 'scale' => 2, 'null' => true, 'default' => 0.00])
        ->addColumn('currencycode', 'string', ['limit' => 10, 'null' => false])
        ->addColumn('type', 'integer', ['limit' => 2, 'null' => false])
        ->addColumn('createtime', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
        ->addColumn('paymentmethod', 'integer', ['limit' => 11, 'null' => false])
        ->addColumn('refund_transaction', 'integer', ['limit' => 11, 'null' => false])
        ->addColumn('payment_transaction_id', 'integer', ['limit' => 11, 'null' => false])
        ->create();
    }
}
