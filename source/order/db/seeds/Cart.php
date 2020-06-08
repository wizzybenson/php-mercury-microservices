<?php


use Phinx\Seed\AbstractSeed;

class Cart extends AbstractSeed
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
        for ($i = 0; $i < 250; $i++) {
            $data[] = [
                'cart_id'      => $faker->numberBetween($min = 1, $max = 250),
            ];
        }
        $this->table('cart')->insert($data)->saveData();
    }
}
