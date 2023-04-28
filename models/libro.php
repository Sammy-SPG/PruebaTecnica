<?php

namespace app\models;

use yii\db\ActiveRecord;

class libro extends ActiveRecord 
{
    public function insertBooks($barcode, $title, $description, $urlimg)
    {
        $this->BARCODE = $barcode;
        $this->TITLE = $title;
        $this->DESCRIPTION = $description;
        $this->URLIMG = $urlimg;
        if ($this->save()) {
            // El registro se ha guardado correctamente
            return 'success';
        } else {
            // Ha ocurrido un error al guardar el registro
        }
    }
}