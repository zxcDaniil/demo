<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $product_id
 * @property int $year
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
class ProductsCreateForm extends Products
{
   

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year', 'name_product', 'price', 'country', 'counts', 'photo'], 'required'],
            [['year', 'counts', 'idCategory'], 'integer'],
            [['time_stamp'], 'safe'],
            [['name_product', 'photo', 'country'], 'string', 'max' => 255],
            [['price'], 'string', 'max' => 10],
            [['idCategory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['idCategory' => 'id']],
            ['photo', 'file', 'extensions' => 'png, jpg, jpeg, bmp'],
            
        ];
    }


}
