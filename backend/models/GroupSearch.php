<?php

namespace backend\models;

use common\models\Group;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;

class GroupSearch extends Group
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'safe']
        ];
    }

    public function scenarios()
    {
        return parent::scenarios();
    }

    public function search($params)
    {
        $groups = Group::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $groups
        ]);
        VarDumper::dump($params, 10, true);
        if(!($this->load($params) && $this->validate())){
            return $dataProvider;
        }

        $groups->andFilterWhere(['like', 'name', $this->name])->andFilterWhere(['id' => $this->id]);

        return $dataProvider;
    }
}