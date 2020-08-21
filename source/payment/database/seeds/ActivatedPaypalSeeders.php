use Phinx\Seed\AbstractSeed;

class ActivatedPaypalSeeders extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'active'    => 1
            ]
        ];

        $payment = $this->table('activated_paypal');
        $payment->insert($data)
              ->saveData();
    }
}