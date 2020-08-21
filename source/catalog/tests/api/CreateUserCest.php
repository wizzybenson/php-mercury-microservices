<?php 

class CreateUserCest
{
    // tests
    public function createUserViaAPI(\ApiTester $I)
    {
        $I->amBearerAuthenticated('b37762aa75556c977f85');
        $I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
        $I->sendPOST('/addCatalog/', [
      //      $I->sendPOST('/add/', [
            'libelle' => 103,
            'product' => 9/*,*
            'datecp' =>'2020-04-19 19:11:13'*/

        ]);

      //  $I->sendDELETE('/delete/106'); model et controller
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        //$I->seeResponseIsJson();
       // $I->seeResponseContains('"status":"inserted"');
        /*


                $I->amBearerAuthenticated('74c2a43c9c0b43517b41');
                $I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
                $I->sendDELETE('/deleteCategory/111');
                $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
                $I->seeResponseIsJson();*/




    }
}
