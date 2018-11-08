<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "cartorio".
 *
 * @property integer $id
 * @property string $nome
 * @property string $razao
 * @property string $documento
 * @property string $cep
 * @property string $endereco
 * @property string $bairro
 * @property string $cidade
 * @property string $uf
 * @property string $telefone
 * @property string $email
 * @property string $tabeliao
 * @property integer $is_ativo
 */
class Cartorio extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            ''
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_ativo'], 'integer'],
            [['nome', 'razao', 'bairro', 'cidade', 'email', 'tabeliao'], 'string', 'max' => 255],
            [['documento'], 'string', 'max' => 15],
            [['cep'], 'string', 'max' => 8],
            [['endereco'], 'string', 'max' => 500],
            [['uf'], 'string', 'max' => 2],
            [['telefone'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cartorio';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'razao' => 'Razao',
            'documento' => 'Documento',
            'cep' => 'Cep',
            'endereco' => 'Endereco',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'uf' => 'Uf',
            'telefone' => 'Telefone',
            'email' => 'Email',
            'tabeliao' => 'Tabeliao',
            'is_ativo' => 'Is Ativo',
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\CartorioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\CartorioQuery(get_called_class());
    }
}
