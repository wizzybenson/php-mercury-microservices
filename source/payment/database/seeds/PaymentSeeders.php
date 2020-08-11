use Phinx\Seed\AbstractSeed;

class PaymentSeeders extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'url'    => '/paypal',
                'title' => 'paypal',
                'description' => 'Pay with standard paypal',
                'image' => 'https://lagrida.com/vueressources/img/paypal3.png',
                'status' => 1,
            ],[
                'url'    => '/giftcards',
                'title' => 'Gift Card',
                'description' => 'Pay with gift card',
                'image' => 'https://lagrida.com/vueressources/img/gift-card.png',
                'status' => 1,
            ]
        ];

        $payment = $this->table('payments');
        $payment->insert($data)
              ->saveData();
    }
}