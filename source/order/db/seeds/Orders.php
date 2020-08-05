<?php


use Phinx\Seed\AbstractSeed;

class Orders extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'cart_id'      => $i+1,
                'payment_id'      => null,
                'order_status' => $faker->randomElement($array = array ('placed','paid','shipped','canceled','refunded')),
                'date_order_placed'         => $faker->dateTime->format('Y-m-d H:i:s'),
                'billing_address'    => $faker->address(),
                'billing_address_app'     =>  $faker->secondaryAddress(),
                'billing_city'     =>  $faker->city(),
                'billing_state'     =>  $faker->state(),
                'billing_zip_code'     =>  $faker->postcode(),
                'billing_country'     =>  $faker->country(),
                'shipping_address'     =>  $faker->address(),
                'shipping_address_app'     =>  $faker->secondaryAddress(),
                'shipping_city'     =>  $faker->city(),
                'shipping_state'     =>  $faker->state(),
                'shipping_zip_code'     =>  $faker->postcode(),
                'shipping_country'     =>  $faker->country(),
                'date_order_paid'     => $faker->dateTime->format('Y-m-d H:i:s'),
                'date_shipped'     => $faker->dateTime->format('Y-m-d H:i:s'),
                'order_note'       => $faker->sentence($nbWords = 6, $variableNbWords = true),
            ];
        }

        $this->table('order')->insert($data)->saveData();
    }
}
