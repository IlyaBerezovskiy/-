<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lesson */

$this->title = 'Update Lesson: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Lessons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id, 'student_id' => $model->student_id, 'teacher_id' => $model->teacher_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lesson-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
