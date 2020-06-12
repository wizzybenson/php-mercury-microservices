<?php


use Phinx\Seed\AbstractSeed;

class Payment extends AbstractSeed
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
                'payment_id'      => $faker->numberBetween($min = 1, $max = 250),
            ];
        }
        $this->table('payment')->insert($data)->saveData();
    }
}
