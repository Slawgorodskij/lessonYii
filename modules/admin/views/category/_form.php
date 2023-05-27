<?php

use app\components\MenuWidget;
use app\modules\admin\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Category $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //echo $form->field($model, 'parent_id')->textInput() ?>
    <?php //echo $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name')) ?>

    <div class="form-group field-category-parent_id">
        <label class="control-label" for="category-parent_id">Родительская категория</label>
        <select id="category-parent_id" class="form-control" name="Category[parent_id]">
            <option value="0">Самостоятельная категория</option>
            <?= MenuWidget::widget(['tpl' => 'select', 'model' => $model]) ?>
        </select>

        <div class="help-block"></div>
    </div>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
