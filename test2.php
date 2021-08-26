<?php
use Firebase\JWT\JWT;
require __DIR__ . '/vendor/autoload.php';


class Main
{

    public $publicKey = "-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAgVKp29hHT1r2xVI/2AAj
on+MidCreIT/llJb/KYfw0RnYzvyko69mupHsnUQGwt+fFehnvd4nZLvltIPydrc
KRqeCB4tlcoIwUEmWkJsbpUPg9kkTNW8fPDbZiOUFqvQE2dcNCf7sHlmQmNSc7qp
9GmLioxKkVfl4ct8XEhrilJGDr2veYK/d9Uuo0giMqF7qz9tssNUUuxHoVwPn8O9
mI8PM+J9b+6K6QGSqQZaJt6TUHD+rwEEzo57AyNF0oJg6I4VL/zbo5VzLFEoWX24
vraQ7oPt7RWnBJZAI63cXYLk1Pb5yYha0MMlh+O4yD1RhZ2iAMcjKfwdiLn4fXCP
cwIDAQAB
-----END PUBLIC KEY-----";

    public function getData($token)
    {


//        $jwt = file_get_contents("test.txt");

        $decoded = JWT::decode($token, $this->publicKey, array('RS256'));
        $decoded_array = (array) $decoded;
        return $decoded_array;
    }

}
/*
$class= new Main();
echo "<pre>";
$data =  $class->getData();

$packed_data =  array(
    'data'=>$data['data'],
    'iat'=>$data['iat'],
    'exp'=>$data['exp'],
);
$decoded_data = json_decode($data['data']);
echo 'reason: '.$decoded_data->reason.'<br>';
var_dump($decoded_data);*/
