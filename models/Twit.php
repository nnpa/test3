<?php

namespace app\models;

use Yii;
use app\models\Azs;

/**
 * This is the model class for table "bid".
 *
 * @property int $id
 * @property int $cost
 * @property int $user_id
 * @property int $azs_id
 */
class Twit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'twit';
    }
    
      public function getCategory(){
        return $this->hasOne(Category::class, ['id' => 'categoryId']);
    }
}
