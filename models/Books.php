<?php

namespace app\models;

use yii\base\Model;

class Books extends Model
{
    public $barcode;
    public $title;
    public $description;
    public $urlimg;

    public $newBook = false;

    public function rules()
    {
        return [
            // barcode, title and urlimg are both required
            [['barcode', 'title', 'description' ,'urlimg'], 'required']
        ];
    }


    public function getBook($code)
    {
        $this->newBook = libro::findOne(["BARCODE" => $code]);
        $this->barcode = $this->newBook->BARCODE;
        $this->title = $this->newBook->TITLE;
        $this->description = $this->newBook->DESCRIPTION;
        $this->urlimg = $this->newBook->URLIMG;
    }

    public function save()
    {
        if($this->newBook === false){
            $newBook = new libro();
            $newBook->insertBooks($this->barcode, $this->title, $this->description, $this->urlimg);
        }

        return $this->newBook;
    }

    public function update(){
        $this->newBook = libro::findOne(["BARCODE" => $this->barcode]);
        $this->newBook->DESCRIPTION = $this->description;
        $this->newBook->URLIMG = $this->urlimg;
        $this->newBook->save();
        
        return $this->newBook;
    }

    public function deleteBook($code){
        $this->newBook = libro::findOne(["BARCODE" => $code]);
        $this->newBook->delete();
    }

    public function findAll(){
        return libro::find()->all();
    }
}