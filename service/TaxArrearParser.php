<?php
namespace app\service;

use Yii;
use Sabirov\AntiCaptcha\ImageToText;

class TaxArrearParser
{
    protected function getImage()
    {
        $ch = curl_init('http://kgd.gov.kz/apps/services/CaptchaWeb/generate?uid=0');
        $fp = fopen(Yii::$app->runtimePath.'/cache/captcha.jpg','wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        $http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
        curl_close($ch);
        fclose($fp);

        if ($http_code = 200) {
            return Yii::$app->runtimePath.'/cache/captcha.jpg';
        } else {
            return false;
        }
    }

    protected function solvedCaptcha()
    {
        $anticaptcha = new ImageToText();
        $anticaptcha->setVerboseMode(true);
        $anticaptcha->setKey('');
        $anticaptcha->setFile($this->getImage());

        if ( ! $anticaptcha->createTask() ) {
            $anticaptcha->debout( "API v2 send failed - " . $anticaptcha->getErrorMessage(), "red" );

            return false;
        }

        $taskId = $anticaptcha->getTaskId();

        if ( ! $anticaptcha->waitForResult() ) {
            $anticaptcha->debout( "could not solve captcha", "red" );
            return $anticaptcha->debout( $anticaptcha->getErrorMessage() );
        } else {
            return $anticaptcha->getTaskResult();
        }
    }

    public function getUserDate($iin)
    {
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://kgd.gov.kz/apps/services/culs-taxarrear-search-web/rest/search");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER,[
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode(array(
                "captcha-id" => "0",
                "captcha-user-value" => "{$this->solvedCaptcha()}",
                "iinBin" => $iin
            )
        ));
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }
}
