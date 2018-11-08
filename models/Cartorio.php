<?php

namespace app\models;

use Yii;
use \app\models\base\Cartorio as BaseCartorio;

/**
 * This is the model class for table "cartorio".
 */
class Cartorio extends BaseCartorio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['is_ativo'], 'integer'],
            [['nome', 'razao', 'bairro', 'cidade', 'email', 'tabeliao'], 'string', 'max' => 255],
            [['documento'], 'string', 'max' => 15],
            [['cep'], 'string', 'max' => 8],
            [['endereco'], 'string', 'max' => 500],
            [['uf'], 'string', 'max' => 2],
            [['telefone'], 'string', 'max' => 12]
        ]);
    }
	
}
