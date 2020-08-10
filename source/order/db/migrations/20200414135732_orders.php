<?php

use Phinx\Migration\AbstractMigration;

class Orders extends AbstractMigration
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
        $table = $this->table('order');
        $table->addColumn('cart_id', 'integer', ['null'=>true])
            ->addColumn('payment_id', 'integer', ['null'=>true])
            ->addColumn('billing_address', 'string')
            ->addColumn('billing_address_app', 'string')
            ->addColumn('billing_city', 'string')
            ->addColumn('billing_state', 'string')
            ->addColumn('billing_zip_code', 'string')
            ->addColumn('billing_country', 'string')
            ->addColumn('shipping_address', 'string')
            ->addColumn('shipping_address_app', 'string')
            ->addColumn('shipping_city', 'string')
            ->addColumn('shipping_state', 'string')
            ->addColumn('shipping_zip_code', 'string')
            ->addColumn('shipping_country', 'string')
            ->addColumn('date_order_placed', 'datetime')
            ->addColumn('date_order_paid', 'datetime')
            ->addColumn('date_shipped', 'datetime')
            ->addColumn('order_note', 'string')
            ->addColumn('order_status', 'string')
            ->create();
    }
}
