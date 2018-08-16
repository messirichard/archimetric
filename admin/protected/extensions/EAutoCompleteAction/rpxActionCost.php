<?php
class rpxActionCost extends CAction
{
    public $model;
    public $attribute;
    private $results = array();
 
    public function run()
    {
        $client = Yii::createComponent(array(
          'class' => 'ext.GWebService.GSoapClient',
          'wsdlUrl' => 'http://api.rpxholding.com/wsdl/rpxwsdl.php?wsdl'
        ));
        $username = "deoryz";
        $password  = "1q2w3e4r5t6y";

        $kota = RpxDestination::model()->find('destination = :destination', array(':destination'=>$_POST['kota']))->code;

        $result = $client->call('getRates', array(
			'user' => $username, 
			'password' => $password,
			'origin' => $_POST['from'],
			'destination' => $kota,
			// 'service_type' => 0,
			'weight' => Cart::gramToKg($_POST['berat']),
			// 'disc' => 0,
    	));

		$xml = simplexml_load_string($result);
		$json = json_encode($xml);
		$service = json_decode($json,TRUE);

		if ($service['DATA'] == 'No Data Found') {
		}else{
			if (isset($service['DATA']['SERVICE'])){
				$this->results[] = array(
					'service_code'=>substr($service['DATA']['SERVICE'], -4, 3),
					'service'=>$service['DATA']['SERVICE'],
					'value'=>$service['DATA']['PRICE'],
				);
			}else{
				foreach ($service['DATA'] as $key => $value) {
					$this->results[] = array(
						'service_code'=>substr($value['SERVICE'], -4, 3),
						'service'=>$value['SERVICE'],
						'value'=>$value['PRICE'],
					);
				}
			}
		}
		echo CJSON::encode($this->results);

    }
}