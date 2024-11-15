<?php
require 'vendor/autoload.php';

use App\Services\Router;
use App\Services\TemplateService;

//$action = $_GET['action'] ?? null;
//$id = $_GET['id'] ?? null;
//$method = $_SERVER['REQUEST_METHOD'];
//$data = $_POST;
//$image = $_FILES;
//
//$router = new Router();
//try{
//    $router->route($action, $id, $method, $data,$image);
//}
//catch(\Exception $e){
//    echo $e->getMessage();
//}
//$mail = new \App\Services\Mail();
//$mail->sendMail("dimapryme@gmail.com","Dmitry Beznosiuk", "hello its me charlie");
$templateService = new TemplateService();
echo $templateService->render('pages/containerDetailPage',[]);

