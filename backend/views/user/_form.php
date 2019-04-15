<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'username')->textInput() ?>

    <?= $form->field($model, 'password_hash')->passwordInput() ?>

    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'avatar')->fileInput(['accept' => 'image/*']) ?>
    <?= $form->field($model, 'group_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(\common\models\Group::find()->all(),'id','name'),
            ['prompt'=>'Change user group']
       ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
