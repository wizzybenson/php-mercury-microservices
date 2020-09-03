<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Shipping extends AbstractMigration
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
        $table = $this->table('shipping', ['id' => false, 'primary_key' => ['shippingid']]);
        $table->addColumn('shippingid', 'integer', ['limit' => 11, 'identity' => true])
        ->addColumn('amount', 'decimal', ['precision' => 10, 'scale' => 2, 'null' => true, 'default' => 0.00])
        ->addColumn('method', 'string', ['limit' => 40, 'null' => false])
        ->addColumn('full_name', 'string', ['limit' => 60, 'null' => false])
        ->addColumn('address_line_1', 'string', ['limit' => 50, 'null' => false])
        ->addColumn('address_line_2', 'string', ['limit' => 40, 'null' => false])
        ->addColumn('admin_area_2', 'string', ['limit' => 40, 'null' => false])
        ->addColumn('admin_area_1', 'string', ['limit' => 12, 'null' => false])
        ->addColumn('postal_code', 'integer', ['limit' => 7, 'null' => false])
        ->addColumn('country_code', 'string', ['limit' => 4, 'null' => false])
        ->create();
    }
}
