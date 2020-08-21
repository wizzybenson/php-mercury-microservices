<?php

use Phinx\Migration\AbstractMigration;

class MyFirstMigration extends AbstractMigration
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
	 $table1 = $this->table('Catalog');
         $table1->addColumn('libelle', 'string',['limit' => 200])
               ->addColumn('details', 'string',['limit' => 150])
               ->addColumn('image', 'string',['limit' => 20])
               ->addColumn('datec', 'datetime')
               ->create();

	 $table2 = $this->table('Product');
         $table2->addColumn('lib', 'string',['limit' => 200])
               ->create();

 	 $table3 = $this->table('CatalogProduct');
         $table3->addColumn('catalog', 'integer')
		->addColumn('product', 'integer')
		->addColumn('datecp', 'datetime',['default' => 'CURRENT_TIMESTAMP'])
		->addForeignKey('catalog', 'Catalog', 'id')
		->addForeignKey('product', 'Product', 'id')
 		->create(); 
	
    }
    public function up()
    {
        // fetch a Catalog
        $row = $this->fetchRow('SELECT * FROM Catalog');
	// fetch a Product
        $row = $this->fetchRow('SELECT * FROM Product');

    }

}
