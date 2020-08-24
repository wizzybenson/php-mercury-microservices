<?php


use Phinx\Seed\AbstractSeed;

class PaypalAdminSeeder extends AbstractSeed
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
                'email'    => 'b12@business.com',
                'clientid' => 'AfCgeAWh_bC7ucdREvxCciv_Nkrc-_HQgekclLfRBdPbnoQ5CNIWWa3DNL9m_Ay7FNU1jP58qre5XzDr',
                'clientsecret' => 'EPom1-ckhRGMKiNzSoYF2OnIzJwVW9osKh8TSh48oIEAhpSik13Ud-UbTLxDmIrV7NtMlZJf_gIsA4Tq',
                'sandboxmode' => 1,
                'transactionmethod' => 0,
            ]
        ];

        $seeder = $this->table('paypal_admin');
        $seeder->insert($data)->saveData();
    }
}
