<?php


use Phinx\Seed\AbstractSeed;

class ActivatedPaypalSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'active'    => 1
            ]
        ];

        $seeder = $this->table('activated_paypal');
        $seeder->insert($data)->saveData();
    }
}
