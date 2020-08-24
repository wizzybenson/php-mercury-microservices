<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class PaypalAdmin extends AbstractMigration
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
        $table = $this->table('paypal_admin', ['id' => false, 'primary_key' => ['paypalid']]);
	    $table->addColumn('paypalid', 'integer', ['limit' => 11, 'identity' => true])
        ->addColumn('email', 'string', ['limit' => 100, 'null' => false])
        ->addColumn('clientid', 'string', ['limit' => 225, 'null' => true])
        ->addColumn('clientsecret', 'string', ['limit' => 225, 'null' => true])
		->addColumn('sandboxmode', 'integer', ['limit' => 2, 'null' => false])
		->addColumn('transactionmethod', 'integer', ['limit' => 2, 'null' => false])
		->create();
    }
}
