<?php 

class GetCustomersCest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function getCustomersViaApi(ApiTester $I)
    {
        $I->sendGET('/rest/customers/get');
        $I->seeResponseIsJson();
        $data = $I->grabDataFromResponseByJsonPath('datas');
    }
}
