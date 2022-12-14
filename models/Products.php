<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $product_id
 * @property string $year
 * @property string $name_product
 * @property string|null $photo
 * @property string $price
 * @property string $time_stamp
 * @property string $country
 * @property int $counts
 * @property int $idCategory
 *
 * @property Category $idCategory0
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year', 'name_product', 'price', 'country', 'counts', 'idCategory'], 'required'],
            [['year', 'time_stamp'], 'safe'],
            [['counts', 'idCategory'], 'integer'],
            [['name_product', 'photo', 'country'], 'string', 'max' => 255],
            [['price'], 'string', 'max' => 10],
            [['idCategory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['idCategory' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'year' => 'Год производства',
            'name_product' => 'Наименование',
            'photo' => 'Изображение',
            'price' => 'Цена',
            'time_stamp' => 'Time Stamp',
            'country' => 'Страна-производитель',
            'counts' => 'Колличество товаров',
            'idCategory' => 'Категория',
        ];
    }

    /**
     * Gets query for [[IdCategory0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategory0()
    {
        return $this->hasOne(Category::class, ['id' => 'idCategory']);
    }
}
