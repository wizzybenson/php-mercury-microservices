<?php

use Phinx\Migration\AbstractMigration;

class Coupon extends AbstractMigration
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
        $table = $this->table('coupon');
        $table->addColumn('code', 'string')
            ->addColumn('value', 'float')
            ->addColumn('id_order', 'integer', ['null'=>true])
            ->addColumn('creation_date', 'datetime')
            ->addColumn('expiration_date', 'datetime')
            ->addForeignKey('id_order', 'order', 'id', ['delete'=>'SET_NULL', 'update'=>'NO_ACTION'])
            ->create();
    }
}
