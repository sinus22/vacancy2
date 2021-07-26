<?php

use yii\helpers\VarDumper;

Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(__DIR__, 2) . '/frontend');
Yii::setAlias('@backend', dirname(__DIR__, 2) . '/backend');
Yii::setAlias('@console', dirname(__DIR__, 2) . '/console');
Yii::setAlias('@uploads', dirname(__DIR__, 2) . '/asset/uploads/');
Yii::setAlias('@resumes', dirname(__DIR__, 2) . '/asset/resumes/');


function dd(...$varibles)
{
    foreach ($varibles as $varible) {
        VarDumper::dump($varible, 10, true);
    }
    die();
}