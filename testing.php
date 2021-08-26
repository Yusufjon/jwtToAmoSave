<?php
use Firebase\JWT\JWT;
use AmoCRM\Client;
require __DIR__ . '/vendor/autoload.php';
$App_ID = '6ab24057-c006-4d85-b07f-065012801a15';
$App_SECRET_KEY='abf86a90-62f3-468c-ad4a-271c1d3e1524';


    try {
        // Создание клиента
        $subdomain = 'nemusedu';            // Поддомен в амо срм
        $login = 'sales@nemusedu.com';            // Логин в амо срм
        $hash = '625b96ef1b96b086434cefb4c052f6991bc999a6';            // api ключ
        // Создание клиента
        $amo = new Client($subdomain, $login, $hash);
        $account = $amo->account;
        $lead = $amo->contact;
        $id = $lead->apiAdd();
        echo "<pre>";
        $account = $amo->account;
        print_r($account->apiCurrent());
        echo "</pre>";
   /* var_dump($contact);*/

/*
        $contact['linked_leads_id'] = [(int)$id];
        $contact['name'] = isset($_POST['name']) ? $_POST['name'] : 'not found';

        $contact->addCustomField(164455,[
            [$_POST['full_number'],'WORK'],]);

        $contact->addCustomField(164457, [
            [$_POST['email'], 'WORK'],
        ]);*/



    } catch (\AmoCRM\Exception $e) {
        printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
    }

