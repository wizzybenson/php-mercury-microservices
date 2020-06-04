<?php


use Phinx\Seed\AbstractSeed;

class ItemSeeder extends AbstractSeed
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
        $data=[];
        for($i = 0; $i<25; $i++){
            $data[] = [
                'label' => $faker->company,
                'quantity' => $faker->randomDigit,
                'unitPrice' => $faker->randomFloat(5,1000000)
            ];
        }

        $this->table('item')->insert($data)->save();
    }
}
