<?php


use Phinx\Seed\AbstractSeed;

class Refund extends AbstractSeed
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
                'refund_id'      => $faker->numberBetween($min = 1, $max = 250),
                'reason'      => $faker->numberBetween($min = 1, $max = 4),
                'status' => $faker->randomElement($array = array ('in progress...','canceled','completed')),
                'discussion'  =>  $faker->randomElement($array = array ('Refused','Accepted','refunded')),
            ];
        }
        $this->table('refund')->insert($data)->saveData();

    }
}
