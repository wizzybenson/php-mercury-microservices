use Phinx\Seed\AbstractSeed;

class PaypalSeeders extends AbstractSeed
{
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

        $payment = $this->table('paypal_admin');
        $payment->insert($data)
              ->saveData();
    }
}