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
    $decoded_array['data'] = json_decode($decoded_array['data'],true);
        // Создание клиента
        $subdomain = 'nemusedu';            // Поддомен в амо срм
        $login = 'sales@nemusedu.com';            // Логин в амо срм
        $hash = '625b96ef1b96b086434cefb4c052f6991bc999a6';            // api ключ
        // Создание клиента
        $amo = new Client($subdomain, $login, $hash);
        $account = $amo->account;
        $lead = $amo->lead;
        $contact = $amo->contact;
        $clName = $decoded_array["data"]["booking"]["formInfo"]["contactDetails"]["firstName"];
        $email = $decoded_array["data"]["booking"]["formInfo"]["contactDetails"]["email"];
        $phone = $decoded_array["data"]["booking"]["formInfo"]["contactDetails"]["phone"];
        $wid = $decoded_array["data"]["booking"]["bookedResources"][0]["id"];
        $classname = $decoded_array["data"]['booking']["bookedEntity"]["onlineConference"]["description"];
        $classUrl = $decoded_array["data"]['booking']["bookedEntity"]["onlineConference"]["guestUrl"];
        $start = $decoded_array["data"]["booking"]["bookedEntity"]["singleSession"]["start"];

        $lead->addCustomField(507989,$classUrl);
        $lead->addCustomField(520605,$classname);
        $lead->addCustomField(318877,$clName);
        $lead->addCustomField(164457,$email,'WORK');
        $lead->addCustomField(164455,$phone,'WORK');
        $lead->addCustomField(509651,$start);
        $lead->addCustomField(520047,$wid);




        $contact->addCustomField(164457,$email,'WORK');
        $contact->addCustomField(164455,$phone,'WORK');
        $contact->addCustomField(520047,$wid);
        $contact['linked_leads_id'] = $lead ->apiAdd();


       $contact->apiAdd();


        /*            $contact->addCustomField(520047, [[$decoded_array['Wix_Contact_ID']]]);*/





}















