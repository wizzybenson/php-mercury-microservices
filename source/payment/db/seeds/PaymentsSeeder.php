<?php


use Phinx\Seed\AbstractSeed;

class PaymentsSeeder extends AbstractSeed
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
                'url'    => '/paypal',
                'title' => 'paypal',
                'description' => 'Pay with standard paypal',
                'image' => 'https://lagrida.com/vueressources/img/paypal3.png',
                'status' => 1,
            ],[
                'url'    => '/giftcards',
                'title' => 'Gift Card',
                'description' => 'Pay with gift card',
                'image' => 'https://lagrida.com/vueressources/img/gift-card.png',
                'status' => 1,
            ]
        ];

        $seeder = $this->table('payments');
        $seeder->insert($data)->saveData();
    }
}
