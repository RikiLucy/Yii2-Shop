<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property integer $id
 * @property string $title
 * @property string $subtitle
 * @property string $text
 * @property string $btn_title
 * @property string $btn_link
 * @property string $img
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $image;
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName()
    {
        return 'slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['title', 'subtitle', 'btn_title', 'btn_link'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Загаловок',
            'subtitle' => 'Подзагаловок',
            'text' => 'Текст',
            'btn_title' => 'Надпись на кнопке',
            'btn_link' => 'Ссылка у кнопки',
            'img' => 'Img',
        ];
    }

    public function upload(){
        if ($this->validate()){
            $path = 'upload/store' . $this->img->baseName . '.' . $this->img->extension;
            $this->img->saveAs($path);
            $this->attachImage($path, true);
            unlink($path);
            return true;
        }else{
            return false;
        }
    }


}
