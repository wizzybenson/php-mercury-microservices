<?php 

class CreateCustomerCest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function createCustomerViaApi(ApiTester $I)
    {
        /*$I->sendPOST('/rest/customers/connect');
        $I->seeResponseIsJson();
        $token = $I->grabDataFromResponseByJsonPath('access_token');
        $I->amBearerAuthenticated($token);*/
        $I->amBearerAuthenticated('b91121936ed8d2a2a26a');
        $I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
        $I->sendPOST('/rest/customers/add', [
            'username' => 'hello',
            'email' => 'world@arouay.com'
        ]);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"result":"ok"}');
    }
}
