<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cartorio;

/**
 * app\models\CartorioSearch represents the model behind the search form about `app\models\Cartorio`.
 */
 class CartorioSearch extends Cartorio
{
     
    public $sem_telefone;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_ativo'], 'integer'],
            [['nome', 'razao', 'documento', 'cep', 'endereco', 'bairro', 'cidade', 'uf', 'telefone', 'email', 'tabeliao','sem_telefone'], 'safe'],
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
        $query = Cartorio::find();

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
            'is_ativo' => $this->is_ativo,
        ]);
        
        if($this->sem_telefone){
            $query->andWhere(['telefone' => '']);
        }

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'razao', $this->razao])
            ->andFilterWhere(['like', 'documento', $this->documento])
            ->andFilterWhere(['like', 'cep', $this->cep])
            ->andFilterWhere(['like', 'endereco', $this->endereco])
            ->andFilterWhere(['like', 'bairro', $this->bairro])
            ->andFilterWhere(['like', 'cidade', $this->cidade])
            ->andFilterWhere(['like', 'uf', $this->uf])
            ->andFilterWhere(['like', 'telefone', $this->telefone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'tabeliao', $this->tabeliao]);

        return $dataProvider;
    }
}
