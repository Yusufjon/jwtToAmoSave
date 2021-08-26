<?php
use Firebase\JWT\JWT;
use AmoCRM\Client;
require __DIR__ . '/vendor/autoload.php';
$App_ID = '6ab24057-c006-4d85-b07f-065012801a15';
$App_SECRET_KEY='abf86a90-62f3-468c-ad4a-271c1d3e1524';


$key = "-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAgVKp29hHT1r2xVI/2AAj
on+MidCreIT/llJb/KYfw0RnYzvyko69mupHsnUQGwt+fFehnvd4nZLvltIPydrc
KRqeCB4tlcoIwUEmWkJsbpUPg9kkTNW8fPDbZiOUFqvQE2dcNCf7sHlmQmNSc7qp
9GmLioxKkVfl4ct8XEhrilJGDr2veYK/d9Uuo0giMqF7qz9tssNUUuxHoVwPn8O9
mI8PM+J9b+6K6QGSqQZaJt6TUHD+rwEEzo57AyNF0oJg6I4VL/zbo5VzLFEoWX24
vraQ7oPt7RWnBJZAI63cXYLk1Pb5yYha0MMlh+O4yD1RhZ2iAMcjKfwdiLn4fXCP
cwIDAQAB
-----END PUBLIC KEY-----";
$jwt = file_get_contents("php://input");
if(!empty($jwt)){
    $decoded = JWT::decode($jwt, $key, array('RS256'));
    $decoded_array = (array)$decoded;

    /*
     * $decoded_array massivga teng
     * json kerak bo'lsa json_encode($decoded_array);
     * */

    file_put_contents("result.json",$decoded_array);


    ;

    $test = json_decode( json_encode($decoded_array));
    var_dump($decoded_array);

}


if (isset($_POST)) {
    try {
        // Создание клиента
        $subdomain = 'nemusedu';            // Поддомен в амо срм
        $login = 'sales@nemusedu.com';            // Логин в амо срм
        $hash = '625b96ef1b96b086434cefb4c052f6991bc999a6';            // api ключ
        // Создание клиента
        $amo = new Client($subdomain, $login, $hash);
        $account = $amo->account;
        $lead = $amo->lead;
        $id = $lead->apiAdd();


        $contact['linked_leads_id'] = [(int)$id];
        $contact['name'] = isset($decoded_array['name']) ?
            $decoded_array['name'] : 'not found';

        /*
                    $contact->addCustomField(164455,[
                        [$phone,'WORK'],]);
                    $contact->addCustomField(164457, [
                        [$email, 'WORK'],
                    ]);*/

        $contact->addCustomField(164457,$email);
        $contact->addCustomField(164455,$phone);

        var_dump($contact ->apiAdd());



        /*            $contact->addCustomField(520047, [[$decoded_array['Wix_Contact_ID']]]);*/



    } catch (\AmoCRM\Exception $e) {
        printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
    }

};



// SUBDOMAIN может принимать как часть перед .amocrm.ru,
// так и домен целиком например test.amocrm.ru или test.amocrm.com*


// создаем лида
/*  $lead = $amo->lead;
  $lead->addCustomField(520605, [
      [$_POST['Class Name']],
  ]);
  $lead->addCustomField(509651, [
      [$_POST['Class Date&Time']],
  ]);
  $id = $lead->apiAdd();

  $contact = $amo->contact;
  $contact['linked_leads_id'] = [(int)$id];
  $contact['name'] = isset($_POST['name']) ? $_POST['name'] : 'not found';
  $contact->addCustomField(164455, [[$_POST['phone'],'WORK'],]);
  $contact->addCustomField(164457, [[$_POST['email'], 'WORK'],]);
  $contact->addCustomField(520047, [[$_POST['Wix_Contact_ID']]]);
  $id = $contact->apiAdd();
} catch (\AmoCRM\Exception $e) {
  printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
}*/











