<?php


use Phinx\Seed\AbstractSeed;

class CartSeeder extends AbstractSeed
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
        for ($i = 0; $i < 15; $i++) {
            $data[] = [
                'created'       => $faker->date("Y-m-d"),
            ];
        }

        $this->table('cart')->insert($data)->save();
    }
}
