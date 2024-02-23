<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string|null $image
 * @property float|null $price
 * @property int $category_id
 * @property string|null $test_datetime
 *
 * @property Category $category
 * @property ProductTag[] $productTags
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $image_file;

    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['name', 'category_id', 'price', 'test_datetime', 'image_file'];
        $scenarios[self::SCENARIO_UPDATE] = $scenarios[self::SCENARIO_CREATE];
        return $scenarios;
    }

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
            [['name', 'category_id'], 'required'],
            [['price'], 'number'],
            [['category_id'], 'integer'],
            [['test_datetime'], 'safe'],
            [['name', 'image'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['image_file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => self::SCENARIO_CREATE ],
            [['image_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => self::SCENARIO_UPDATE ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Image',
            'price' => 'Price',
            'category_id' => 'Category ID',
            'test_datetime' => 'Test Datetime',
        ];
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
     * Gets query for [[ProductTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductTags()
    {
        return $this->hasMany(ProductTag::class, ['product_id' => 'id']);
    }

    public function upload()
    {
        if($this->image_file){
            $path = Yii::getAlias('@uploads') . '/' . $this->image_file->baseName . '.' . $this->image_file->extension;
            $this->image = $path;
            $this->image_file->saveAs('@app/web' . '/' . $path, false);
            return $path;
        }
        return true;
        
    }

}
