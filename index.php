<?php
session_start();
// error_reporting(0);

require_once __DIR__.'/../vendor/autoload.php'; 
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$dbcon = array(
            'host'=>'localhost',
            'user'=>'root',
            'pass'=>'',
            'db'=>'archimetric',
            // 'user'=>'markdesi_root',
            // 'pass'=>'1q2w3e4r5t6y',
            // 'db'=>'markdesi_archimetric',
    );

include('get_setting.php');

$app = new Silex\Application();

/* Global constants */
define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT']);
define('APP_PATH', dirname(ROOT_PATH).DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR);
define('ASSETS_PATH', ROOT_PATH.DIRECTORY_SEPARATOR);

// http cache
$app->register(new Silex\Provider\HttpCacheServiceProvider(), array(
    'http_cache.cache_dir' => __DIR__.'/cache/',
));

// Register Twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

// Register Swiftmailer
$app->register(new Silex\Provider\SwiftmailerServiceProvider());

// Register URL Generator
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

// Register Validator
$app->register(new Silex\Provider\ValidatorServiceProvider());

$app['all_m_fcs'] = $data_a_fcs;
$app["twig"]->addGlobal("Data_Fcs", $data_a_fcs);

$app["twig"]->addGlobal("get_setting", $Gsetting);

$app["twig"]->addGlobal("get_service", $data_service);

$app["twig"]->addGlobal("get_leader", $data_leader);

$app["twig"]->addGlobal("get_lcategory", $data_lcategory);

$app['data_gallery'] = $data_gallery;
$app["twig"]->addGlobal("data_gallery", $data_gallery);

// ------------------ Homepage ------------------------
$app->get('/', function () use ($app) {
    $msg = isset($_GET['msg'])? $_GET['msg'] : '';
    
    return $app['twig']->render('page/home.twig', array(
        'layout' => 'layouts/column2.twig',
        // 'layout' => 'layouts/column1.twig',
        'msg' =>$msg,
    ));
})
->bind('homepage');

// ------------------ about ------------------
$app->get('/about', function () use ($app) {

    return $app['twig']->render('page/about.twig', array(
        'layout' => 'layouts/column_inside.twig',
    ));
})
->bind('about');

// Read brand lightwood
    // $maindir3 =  __DIR__."/asset/images/menu/all-menu/";
    // $data_all_menu = array();
    // $mydir3 = opendir($maindir3);
    // while($fn3 = readdir($mydir3)){
    //     if (substr($fn3,-3) == 'jpg' || substr($fn3,-4) == 'jpeg' || substr($fn3,-3) == 'gif' || substr($fn3,-3) == 'png'){
    //             $fn3 = utf8_decode($fn3);
    //             $namas = substr($fn3, 0, -4);

    //             $data_all_menu[] =  array(
    //                 'name' => $namas,
    //                 'images' => $fn3,
    //                 );
    //             }
    // }
    // closedir($mydir3);
    // $app['all_menu_product'] = $data_all_menu;
    // $app["twig"]->addGlobal("Data_all_products", $data_all_menu);

// ------------------ Menu ------------------
$app->get('/project', function () use ($app) {

    $ids = isset($_GET['category'])? $_GET['category'] : 0;
    if ($ids != 0) {
        $data = getGallery($ids);
    }else{
        $data = $app['data_gallery'];
    }


    return $app['twig']->render('page/project.twig', array(
        'layout' => 'layouts/column_inside.twig',
        'data' => $data,
        'category_id' => $ids,
    ));
})
->bind('project');

// ------------------ careers ------------------
$app->get('/careers', function () use ($app){

    return $app['twig']->render('page/careers.twig', array(
        'layout' => 'layouts/column_inside.twig',
    ));
})
->bind('careers');

// ------------------ Contact ------------------
$app->get('/contact', function () use ($app) {

    return $app['twig']->render('page/contact.twig', array(
        'layout' => 'layouts/column_inside.twig',
    ));
})
->bind('contact');

// ------------------ Contact Us ------------------
$app->match('/contact-us', function (Request $request) use ($app) {
    $errorMessage = array();

    $hero_image = false;
    $app["twig"]->addGlobal("hero_image", $hero_image);

    $data = $request->get('Contact');
    if ($data == null) {
        $data = array(
            'name'=>'',
            'email'=>'',
            'phone'=>'',
            'company'=>'',
            'address'=>'',
            'country'=>'',
            'message'=>'',
        );
    }

    if ($_POST) {

         if (!isset($_POST['g-recaptcha-response'])) {
            return $app->redirect($app['url_generator']->generate('contactus').'?msg=error_message');
        }
        $secret_key = "6Lfhyf8SAAAAABJ2p1sV8mV790VW7LAVOsy2qile";
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
        
        $response = json_decode($response);
        if($response->success==false)
        {
          return $app->redirect($app['url_generator']->generate('contactus').'?msg=error_message');
        }else{

        $constraint = new Assert\Collection( array(
            'name' => new Assert\NotBlank(),
            'email' => array(new Assert\Email(), new Assert\NotBlank()),
            'phone' => new Assert\Length(array('max'=>2000)),
            'company' => new Assert\Length(array('max'=>2000)),
            'address' => new Assert\Length(array('max'=>2000)),
            'country' => new Assert\Length(array('max'=>2000)),
            'message' => new Assert\Length(array('max'=>2000)),
        ) );

        $errors = $app['validator']->validateValue($data, $constraint);

        $errorMessage = array();
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                $errorMessage[] = $error->getPropertyPath().' '.$error->getMessage();
            }
        } else {
            // $app['swiftmailer.options'] = array(
            //     'host' => 'mail.archimetric.co.id',
            //     'port' => '25',
            //     'username' => 'no-reply@archimetric.co.id',
            //     'password' => '1q2w3e4r5t6y',
            //     'encryption' => null,
            //     'auth_mode' => login
            // );

            $pesan = \Swift_Message::newInstance()
                ->setSubject('Hi, Contact Website Archimetric.co.id')
                ->setFrom(array('no-reply@archimetric.co.id'))
                ->setTo( array('info@archimetric.co.id', $data['email']) )
                ->setBcc( array('deoryzpandu@gmail.com', 'ibnu@markdesign.net') )
                ->setReplyTo(array('info@archimetric.co.id '))
                ->setBody($app['twig']->render('page/mail.twig', array(
                    'data' => $data,
                )), 'text/html');

            $app['mailer']->send($pesan);
            return $app->redirect($app['url_generator']->generate('contactus').'?msg=success');
            }
        }
        // else captcha
    }

    return $app['twig']->render('page/contactus.twig', array(
        'layout' => 'layouts/column_inside.twig',
        'error' => $errorMessage,
        'data' => $data,
        'msg' =>isset($_GET['msg'])? $_GET['msg'] : '',
    ));
})
->bind('contactus');

$app['debug'] = true;

$app->run();