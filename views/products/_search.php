<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProductsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'year') ?>

    <?= $form->field($model, 'name_product') ?>

    <?= $form->field($model, 'photo') ?>

    <?= $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'time_stamp') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'counts') ?>

    <?php // echo $form->field($model, 'idCategory') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
