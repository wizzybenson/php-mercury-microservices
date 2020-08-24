<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class PayerPaypal extends AbstractMigration
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
        $table = $this->table('paypal_payers', ['id' => false, 'primary_key' => ['payerid']]);
        $table->addColumn('payerid', 'integer', ['limit' => 11, 'identity' => true])
        ->addColumn('given_name', 'string', ['limit' => 15, 'null' => false])
        ->addColumn('surname', 'string', ['limit' => 15, 'null' => false])
        ->addColumn('email_address', 'string', ['limit' => 40, 'null' => false])
        ->addColumn('payer_id', 'string', ['limit' => 40, 'null' => false])
        ->addColumn('country_code', 'string', ['limit' => 6, 'null' => false])
        ->create();
    }
}
