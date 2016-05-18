<?php

namespace backend\modules\settings\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\settings\models\Emails;

/**
 * EmailsSearch represents the model behind the search form about `backend\modules\settings\models\Emails`.
 */
class EmailsSearch extends Emails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['reciever_name', 'reciever_email', 'subject', 'content', 'attachment'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Emails::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'reciever_name', $this->reciever_name])
            ->andFilterWhere(['like', 'reciever_email', $this->reciever_email])
            ->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'attachment', $this->attachment]);

        return $dataProvider;
    }
}
