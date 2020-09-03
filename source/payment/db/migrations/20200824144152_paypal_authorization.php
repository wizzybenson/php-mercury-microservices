<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class PaypalAuthorization extends AbstractMigration
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
        $table = $this->table('paypal_authorizations', ['id' => false, 'primary_key' => ['authorizationid']]);
        $table->addColumn('authorizationid', 'integer', ['limit' => 11, 'identity' => true])
        ->addColumn('authorized_paypal_id', 'string', ['limit' => 40, 'null' => false])
        ->addColumn('paypal_id', 'integer', ['limit' => 11, 'null' => false])
        ->create();
    }
}
