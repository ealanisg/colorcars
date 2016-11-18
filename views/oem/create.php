<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Oem */

$this->title = Yii::t('app', 'Create Oem');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Oems'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
