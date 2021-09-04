<?php
use Firebase\JWT\JWT;
use AmoCRM\Client;
require __DIR__ . '/vendor/autoload.php';


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
    $decoded_array2 = json_decode($decoded_array['data'],true);
    $text = "\xB1\x31";
    $json  = json_decode($decoded_array2['data'],true);
    $error = json_last_error();
    var_dump($json);
    file_put_contents("result.json",$decoded_array2);
    // Создание клиента
    $subdomain = 'nemusedu';            // Поддомен в амо срм
    $login = 'sales@nemusedu.com';            // Логин в амо срм
    $hash = '625b96ef1b96b086434cefb4c052f6991bc999a6';            // api ключ
    $subdomain = 'nemusedu';            // Поддомен в амо срм
    $login = 'sales@nemusedu.com';            // Логин в амо срм
    $hash = '625b96ef1b96b086434cefb4c052f6991bc999a6';            // api ключ
    // Создание клиента
    $amo = new Client($subdomain, $login, $hash);
    $account = $amo->account;
    $lead = $amo->lead;
    $contact = $amo->contact;
    $localTime = date_default_timezone_set($json["booking"]["formInfo"]["contactDetails"]["timeZone"]);
    $getTimeZone = date_default_timezone_get();
    $date = new DateTime($json["booking"]["bookedEntity"]["singleSession"]["start"], new DateTimeZone($getTimeZone));
    $date->setTimezone(new DateTimeZone($json["booking"]["formInfo"]["contactDetails"]["timeZone"]));
    $final = $date->format('d.m.Y H:i');
    $clName = $json["booking"]["formInfo"]["contactDetails"]["firstName"];
    $email = $json["booking"]["formInfo"]["contactDetails"]["email"];
    $phone = $json["booking"]["formInfo"]["contactDetails"]["phone"];
    $wid = $json["booking"]["formInfo"]["contactDetails"]["contactId"];
    /*   $locaTimeCheck = date($localTime);*/
    $classname = $json['booking']["bookedEntity"]["onlineConference"]["description"];
    $classUrl = $json['booking']["bookedEntity"]["onlineConference"]["guestUrl"];
    $start = $json["booking"]["bookedEntity"]["singleSession"]["start"];
    $classReminder = true;
    $lead->addCustomField(507989,$classUrl);
    $lead->addCustomField(520605,$classname);
    $lead->addCustomField(318877,$clName);
    $lead->addCustomField(164457,$email,'WORK');
    $lead->addCustomField(164455,$phone,'WORK');
    $lead->addCustomField(509651,$start);
    $lead->addCustomField(520641,$classReminder);
    $lead->addCustomField(520739,$final,'GTM');
    $contact->addCustomField(164457,$email,'WORK');
    $contact->addCustomField(164455,$phone,'WORK');
    $contact->addCustomField(520047,$wid);
    $contact['linked_leads_id'] = $lead ->apiAdd();
    $contact['name'] = isset($json["booking"]["formInfo"]["contactDetails"]["firstName"]) ? $json["booking"]["formInfo"]["contactDetails"]["firstName"] : 'not found';
    $contact->apiAdd();
}














