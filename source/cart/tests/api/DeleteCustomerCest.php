<?php 

class DeleteCustomerCest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function deleteCustomerViaApi(ApiTester $I)
    {
        $I->amBearerAuthenticated('52447b15e73b644f8a38');
        $I->sendDELETE('/rest/customers/delete', [
            'username' => 'abdo',
        ]);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"result":"ok"}');
    }
}
