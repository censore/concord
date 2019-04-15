<?php

namespace backend\models;

use common\models\User;
use yii\data\ActiveDataProvider;

class UserSearch extends User
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['username', 'email', 'group_id'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return parent::scenarios();
    }

    public function search($params)
    {
        $users = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $users
        ]);

        if(!($this->load($params) && $this->validate())){
            return $dataProvider;
        }



        $users->joinWith('groupId');

        $users->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'groups.name', $this->group_id])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['id' => $this->id]);

        return $dataProvider;
    }
}