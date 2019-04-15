<?php

namespace common\models;

use Yii;
use yii\base\InvalidValueException;
use yii\db\ActiveRecord;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "Groups".
 *
 * @property int $id
 * @property string $name
 */
class Group extends ActiveRecord
{

    const ADMIN_RECORD_NAME = 'Admin';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    public function createAdminGroup()
    {
        $current = new self();
        VarDumper::dump($current, 10, true);
        $current->name = self::ADMIN_RECORD_NAME;
        $current->save();

        return $current->id;
    }

    public function getOrCreate($group = null)
    {
        if($group == null){
            $group = self::ADMIN_RECORD_NAME;
        }

        $type = gettype($group);

        if($type == 'integer'){
            $condition = [
                'id' => $group
            ];
        }elseif($type == 'string'){
            $condition = [
                'name' => $group
            ];
        }elseif ($type == 'object' || $type == 'array'){
            $condition = [
                'id' => (object) $group->id
            ];
        }else{
            throw new InvalidValueException('Group type is invalid');
        }

        if($model = self::find($condition)->one() != null){
            $model = self::find($condition)->one();
            return $model->id;
        }elseif($group == self::ADMIN_RECORD_NAME){
            return $this->createAdminGroup();
        }

    }
}
