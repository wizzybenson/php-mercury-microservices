<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Payments extends AbstractMigration
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
    public function change(): void{
        $table = $this->table('payments', ['id' => false, 'primary_key' => ['paymentid']]);
	    $table->addColumn('paymentid', 'integer', ['limit' => 11, 'identity' => true])
		->addColumn('url', 'string', ['limit' => 100, 'null' => false])
		->addColumn('title', 'string', ['limit' => 100, 'null' => false])
		->addColumn('description', 'string', ['limit' => 255, 'null' => true])
		->addColumn('image', 'string', ['limit' => 255, 'null' => false])
		->addColumn('status', 'integer', ['limit' => 2, 'null' => true, 'default' => 0])
		->create();
    }
}
