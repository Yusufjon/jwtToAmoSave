<?php
use Firebase\JWT\JWT;
require __DIR__ . '/vendor/autoload.php';
$App_ID = '6ab24057-c006-4d85-b07f-065012801a15';
$App_SECRET_KEY='abf86a90-62f3-468c-ad4a-271c1d3e1524';


/*
if (isset($_POST)) {

    var_dump($_POST);
    exit();
}*/
/**
echo 'POST qurtop dedi';*/

$result = file_get_contents("php://input");

$pub_key = "-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAgVKp29hHT1r2xVI/2AAj
on+MidCreIT/llJb/KYfw0RnYzvyko69mupHsnUQGwt+fFehnvd4nZLvltIPydrc
KRqeCB4tlcoIwUEmWkJsbpUPg9kkTNW8fPDbZiOUFqvQE2dcNCf7sHlmQmNSc7qp
9GmLioxKkVfl4ct8XEhrilJGDr2veYK/d9Uuo0giMqF7qz9tssNUUuxHoVwPn8O9
mI8PM+J9b+6K6QGSqQZaJt6TUHD+rwEEzo57AyNF0oJg6I4VL/zbo5VzLFEoWX24
vraQ7oPt7RWnBJZAI63cXYLk1Pb5yYha0MMlh+O4yD1RhZ2iAMcjKfwdiLn4fXCP
cwIDAQAB
-----END PUBLIC KEY-----";

function deshift($key,$token){

    $jwt = $token;
    $decoded = JWT::decode($jwt, $key, array('RS256'));
    $decoded_array = (array)$decoded;
    return $decoded_array;
}

file_put_contents("test.txt",json_decode(deshift($pub_key,$result),true));

/*
use Firebase\JWT\JWT;

require __DIR__ . '/vendor/autoload.php';
$App_ID = '6ab24057-c006-4d85-b07f-065012801a15';
$App_SECRET_KEY = 'abf86a90-62f3-468c-ad4a-271c1d3e1524';

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
if (!empty($jwt)) {
    $decoded = JWT::decode($jwt, $key, array('RS256'));
    $decoded_array = (array)$decoded;

    /*
     * $decoded_array massivga teng
     * json kerak bo'lsa json_encode($decoded_array);
     * */


    var_dump($decoded_array);
    file_put_contents("result.json", $decoded_array);

}


*/




























































/*class Main
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



    public function getData()
    {

        $jwt = 'eyJraWQiOiI0X1h4SV9aRyIsImFsZyI6IlJTMjU2In0.eyJkYXRhIjoie1wic2VuZFNtc1JlbWluZGVyXCI6ZmFsc2UsXCJyZWFzb25cIjpcIlZJU0lUT1JfQk9PS0lOR19DT05GSVJNRURcIixcIm5vdGlmeVBhcnRpY2lwYW50c1wiOnRydWUsXCJwYXJ0aWNpcGFudE5vdGlmaWNhdGlvblwiOntcIm5vdGlmeVBhcnRpY2lwYW50c1wiOnRydWV9LFwiYm9va2luZ1wiOntcImJvb2tlZFJlc291cmNlc1wiOlt7XCJpZFwiOlwiOTM2ZDIwNzgtNzliYS00OWNhLWI4MmQtOGYxMmI4YTA1MGFjXCIsXCJuYW1lXCI6XCJEb3JnYWxcIixcImVtYWlsXCI6XCJkb3JnYUB3aXguY29tXCJ9XSxcImZvcm1JbmZvXCI6e1wiY29udGFjdERldGFpbHNcIjp7XCJlbWFpbFwiOlwiRG9oQERvaC5jb21cIixcImxhc3ROYW1lXCI6XCJTaW1wc29uXCIsXCJmaXJzdE5hbWVcIjpcIkhvbWVyXCIsXCJjb3VudHJ5Q29kZVwiOlwiSUxcIixcInRpbWVab25lXCI6XCJBc2lhL0plcnVzYWxlbVwiLFwicGhvbmVcIjpcIjU1NTg3MDdcIn0sXCJwYXltZW50U2VsZWN0aW9uXCI6W3tcInJhdGVMYWJlbFwiOlwiZ2VuZXJhbFwiLFwibnVtYmVyT2ZQYXJ0aWNpcGFudHNcIjoxfV0sXCJjdXN0b21Gb3JtRmllbGRzXCI6e1wiZGU2OGJkYWQtYjAwNi00YTJjLTkwOWUtOWZlNjI4YTkwMDljXCI6XCJ0cnVlXCJ9LFwiYWRkaXRpb25hbEZpZWxkc1wiOlt7XCJpZFwiOlwiNTY4OGE0NmUtYWEwYi00MjRkLWI5MjktODEwZjBjY2UyNWUyXCIsXCJsYWJlbFwiOlwiQWRkIFlvdXIgTWVzc2FnZVwiLFwidmFsdWVUeXBlXCI6XCJMT05HX1RFWFRcIn0se1wiaWRcIjpcImRlNjhiZGFkLWIwMDYtNGEyYy05MDllLTlmZTYyOGE5MDA5Y1wiLFwidmFsdWVcIjpcInRydWVcIixcImxhYmVsXCI6XCJJIGFncmVlIHRvIHRoZSBUZXJtcyAmIENvbmRpdGlvbnNcIixcInZhbHVlVHlwZVwiOlwiQ0hFQ0tfQk9YXCJ9XX0sXCJwYXltZW50RGV0YWlsc1wiOntcImJhbGFuY2VcIjp7XCJmaW5hbFByaWNlXCI6e1wiYW1vdW50XCI6XCIyMzRcIixcImN1cnJlbmN5XCI6XCJJTFNcIixcImRvd25QYXlBbW91bnRcIjpcIjBcIn0sXCJhbW91bnRSZWNlaXZlZFwiOlwiMjM0XCJ9LFwid2l4UGF5RGV0YWlsc1wiOntcIm9yZGVyQXBwcm92YWxUaW1lXCI6XCIyMDIwLTA1LTA3VDExOjU1OjE0Ljc2MFpcIixcIm9yZGVySWRcIjpcImI3OWRkMjQzLThiYzAtNGVkNC05Mjk4LTE0ZThlMTRjNzhlN1wiLFwib3JkZXJBbW91bnRcIjpcIjIzNFwiLFwicGF5bWVudFZlbmRvck5hbWVcIjpcIlBheVBhbFwiLFwidHhJZFwiOlwiZmFhMGY4MjctYzBkNC00MTBkLWJlOWYtYjVkNzMxMWYxOTRkXCJ9LFwic3RhdGVcIjpcIkNPTVBMRVRFXCIsXCJ3aXhQYXlNdWx0aXBsZURldGFpbHNcIjpbe1wib3JkZXJBcHByb3ZhbFRpbWVcIjpcIjIwMjAtMDUtMDdUMTE6NTU6MTQuNzYwWlwiLFwib3JkZXJJZFwiOlwiYjc5ZGQyNDMtOGJjMC00ZWQ0LTkyOTgtMTRlOGUxNGM3OGU3XCIsXCJvcmRlckFtb3VudFwiOlwiMjM0XCIsXCJwYXltZW50VmVuZG9yTmFtZVwiOlwiUGF5UGFsXCIsXCJ0eElkXCI6XCJmYWEwZjgyNy1jMGQ0LTQxMGQtYmU5Zi1iNWQ3MzExZjE5NGRcIn1dfSxcImlkXCI6XCI0ZDFiNTQ1NC02ZDQzLTRhNGMtOTRiNi01MWUzMzMyNzY2NzRcIixcInN0YXR1c1wiOlwiQ09ORklSTUVEXCIsXCJib29rZWRFbnRpdHlcIjp7XCJyYXRlXCI6e1wibGFiZWxlZFByaWNlT3B0aW9uc1wiOntcImdlbmVyYWxcIjp7XCJhbW91bnRcIjpcIjIzNFwiLFwiY3VycmVuY3lcIjpcIklMU1wiLFwiZG93blBheUFtb3VudFwiOlwiMFwifX0sXCJwcmljZVRleHRcIjpcIlwifSxcImxvY2F0aW9uXCI6e1wibG9jYXRpb25UeXBlXCI6XCJPV05FUl9CVVNJTkVTU1wifSxcInRhZ3NcIjpbXCJJTkRJVklEVUFMXCJdLFwic2NoZWR1bGVJZFwiOlwiMGU4NzM2OTMtMzNjZS00MTU5LWFkY2YtYWEyZjUwYzkyZjA0XCIsXCJ0aXRsZVwiOlwiQXBwb2ludG1lbnQgLSBPbmxpbmUgUGF5bWVudFwiLFwic2luZ2xlU2Vzc2lvblwiOntcInNlc3Npb25JZFwiOlwiMm1tb1cwdndLY1NGeXh0T2ZDZEtmUno5eWVRcXZSTlA5Z0NvMXlzUTJYRzNsQ3VIckFaUVZ0aVcwQnZhNHNhWEJWcjhxUGp5bElvTTBSemNCUU1XVjM3eXQ2Sjl4STBIYndKSlwiLFwic3RhcnRcIjpcIjIwMjAtMDUtMTJUMTA6MDA6MDBaXCIsXCJlbmRcIjpcIjIwMjAtMDUtMTJUMTE6MDA6MDBaXCJ9LFwic2VydmljZUlkXCI6XCJkZmRiYjZmNi05MjNhLTRlMTUtODgzZC0zMWI1MzU1NTkzOWJcIn0sXCJjcmVhdGVkXCI6XCIyMDIwLTA1LTA3VDExOjU1OjA0LjE2OVpcIn19IiwiaWF0IjoxNjI5NTU0MjIxLCJleHAiOjE2MzMxNTQyMjF9.QtHsT0ZrII2lJ88VE2RKZxMp8EuiUqTK_Zk7RAos8VL06pz_Ud-HKYE68jyWjlELd9CmexNDX6RKAuEc9aezYtEpPsV6XcQRyvWLAOR0p5PiRkEwZaXRMlZWK9qK6rTzaNb-wtX86l6vIVrEB-BU82ybgpqU5Axj-WlzNrXmxzX5TkZvV36MrwN-8ZavjYGZLBRlFBNNzw8A4MbjmR-h8bDcIh4WuAZdFoap0y5XTfw1v-ot37sPmMmtkaUcd2ZSJu8qRq22T-ucxjFAo5n8n-1V1BisJnTnd1EDBiLVXuexKbGi05Gozb23Ss9E2oEw-gz0ZQYY-ZJgA_eA6DE6qg';
        $decoded = JWT::decode($jwt, $this->publicKey, array('RS256'));
        $decoded_array = (array) $decoded;
        return $decoded_array;
    }

}

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
