<?php
class rpxRemoteCityLocal extends CAction
{
    public $model;
    public $attribute;
    private $results = array();
 
    public function run()
    {
        if ($_GET['update']=='1') {
            $client = Yii::createComponent(array(
              'class' => 'ext.GWebService.GSoapClient',
              'wsdlUrl' => 'http://api.rpxholding.com/wsdl/rpxwsdl.php?wsdl'
            ));
            $username = "deoryz";
            $password  = "1q2w3e4r5t6y";

            $result = $client->call('getDestination', array('user' => $username, 'password' => $password));
            $xml = simplexml_load_string($result);
            $json = json_encode($xml);
            $destination = json_decode($json,TRUE);
            RpxDestination::model()->deleteAll();
            foreach ($destination['DATA'] as $key => $value) {
                $model = new RpxDestination;
                $model->code = substr($value['DESTINATION'], 0, 3);
                $model->destination = substr($value['DESTINATION'], 4);
                $model->save(false);
            }
        }
        $criteria = new CDbCriteria;
        $criteria->addSearchCondition('destination', $_GET['term']);
        $kota = RpxDestination::model()->findAll($criteria);
        foreach ($kota as $key => $value) {
            $this->results[]=$value->destination;
        }
        echo CJSON::encode($this->results);

    }
}