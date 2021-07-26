<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Profile;

/**
 * ProfileSearch represents the model behind the search form of `common\models\Profile`.
 */
class ProfileSearch extends Profile
{
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id', 'province_id', 'region_id', 'nation_id', 'gender_id', 'family_status_id', 'soha_yunalish_id', 'maqul_keladigan_id', 'party_id', 'military_rank_id', 'driving_license_id', 'status'], 'integer'],
            [['first_name', 'last_name', 'patronymic', 'address', 'phone_1', 'phone_2', 'date_birth', 'email', 'specialization', 'image', 'computer_skills', 'resume', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Profile::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'province_id' => $this->province_id,
            'region_id' => $this->region_id,
            'date_birth' => $this->date_birth,
            'nation_id' => $this->nation_id,
            'gender_id' => $this->gender_id,
            'family_status_id' => $this->family_status_id,
            'soha_yunalish_id' => $this->soha_yunalish_id,
            'maqul_keladigan_id' => $this->maqul_keladigan_id,
            'party_id' => $this->party_id,
            'military_rank_id' => $this->military_rank_id,
            'driving_license_id' => $this->driving_license_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone_1', $this->phone_1])
            ->andFilterWhere(['like', 'phone_2', $this->phone_2])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'specialization', $this->specialization])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'computer_skills', $this->computer_skills])
            ->andFilterWhere(['like', 'resume', $this->resume]);

        return $dataProvider;
    }
}
