<?php


use Phinx\Seed\AbstractSeed;

class CustomerSeeder extends AbstractSeed
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
        for($i = 0; $i<20; $i++){
            $data[] = [
                'username' => $faker->userName,
                'email' => $faker->email
            ];
        }

        $this->table('customer')->insert($data)->save();
    }
}
