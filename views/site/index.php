<?php

/** @var yii\web\View $this */

$this->title = 'Inicio';
use yii\bootstrap5\Nav;
use yii\bootstrap5\Html;

?>
<div class="site-index">
<div class="row">
    <div class="gridBooks">
    <?php foreach ($model as $row): ?>
        <div class="cardBook">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" style="overflow: hidden; max-height: 400px;" src="<?= $row->URLIMG ?>" alt="<?= $row->TITLE ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $row->TITLE ?></h5>
                    <p class="card-text"><?= $row->DESCRIPTION ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted"><?= $row->BARCODE ?></small>
                        <div class="">
                            <?php
                            if(!Yii::$app->user->isGuest) echo Nav::widget([
                                'options' => ['class' => 'flex'],
                                'items' =>  [
                                    '<li class="nav-item">'. Html::beginForm(['/site/update', 'id' => $row->BARCODE]). Html::submitButton('Actualizar'). Html::endForm(). '</li>',
                                    '<li class="nav-item">'. Html::beginForm(['/site/delete', 'id' => $row->BARCODE]). Html::submitButton('Eliminar'). Html::endForm(). '</li>'
                                    ]
                            ]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    </div>
</div>
</div>
