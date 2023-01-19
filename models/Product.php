<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property string $country
 * @property string $image
 * @property int|null $category_id
 * @property string $color
 * @property int|null $count
 * @property string|null $data
 *
 * @property Cart[] $carts
 * @property Category $category
 * @property Order[] $orders
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'country', 'image', 'color'], 'required'],
            [['price', 'category_id', 'count'], 'integer'],
            [['data'], 'safe'],
            [['image'], 'file',  'extensions' => ['png', 'jpg', 'gif'],'skipOnEmpty' => false ],
            [['name', 'country', 'color'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'price' => 'Цена',
            'country' => 'Страна',
            'image' => 'Фото',
            'category_id' => 'Category ID',
            'color' => 'Цвет',
            'count' => 'Количество',
            'data' => 'Дата',
        ];
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['product_id' => 'id']);
    }
}
