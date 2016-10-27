<?php
namespace agent\components;

use yii;
use yii\base\Object;
use yii\web\UploadedFile;

class Upload extends Object
{
    public function UploadImage($model,$path,$originName,$goods_id,$isthumb=true)
    {
        $root = $_SERVER['DOCUMENT_ROOT'].'/'.$path;
        $files = UploadedFile::getInstance($model,$originName);
        $folder = $goods_id.'/';

    }
}