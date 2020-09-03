<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Authorization extends AbstractMigration
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
        $table = $this->table('authorizations', ['id' => false, 'primary_key' => ['authorization_id']]);
        $table->addColumn('authorization_id', 'integer', ['limit' => 11, 'identity' => true])
        ->addColumn('createtime', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
        ->addColumn('expiration_date', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
        ->addColumn('capture_date', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
        ->addColumn('paymentmethod', 'integer', ['limit' => 11, 'null' => false])
        ->addColumn('authorization_transaction', 'integer', ['limit' => 11, 'null' => true, 'default' => 0])
        ->addColumn('payment_transaction_id', 'integer', ['limit' => 11, 'null' => false])
        ->addColumn('status', 'integer', ['limit' => 2, 'null' => true, 'default' => 0])
        ->create();
    }
}
