<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Cartorio;
use yii\validators\Validator;


class ImportadorController extends Controller
{
    /**
     * Função responsável por popular os objetos
     */
    protected function _populateModel($attrMap,$row,$objCartorio=false)
    {
        if(!$objCartorio instanceof Cartorio){
            $objCartorio = new Cartorio();
        }
        
        /* Através do mapeamento vou populando os valores*/
        foreach ($attrMap as $pos => $attr){
            
            /* Coluna ativo XLSX*/
            if($attr == 'is_ativo'){
                if($row[$pos] == 'SIM'){
                    $objCartorio->is_ativo = 1;
                }else{
                    $objCartorio->is_ativo = 0;
                }
                continue;
            }
            
            /* Coluna ativo XLSX*/
            if($attr == 'ativo'){
                $objCartorio->is_ativo = $row->ativo;
                continue;
            }
            
            
            if(is_object($row)){
                if(property_exists($objCartorio,$attr)){
                    $objCartorio->$attr = (string) $row->$attr;
                }
            }else{
                $objCartorio->$attr = (string) $row[$pos];
            }
            
        }
        
        return $objCartorio;
    }
    
    /**
     * Faço a leitura do arquivo xlsx 
     * e importo para a base de dados.
     */
    public function actionImportaBase()
    {
        /* Fiz um mapeamento de posição, 
         * atributo para facilitar na leitura
         *  do código
         */
        $attrMapExcel = [
            'nome',
            'razao',
            'documento',
            'cep',
            'endereco',
            'bairro',
            'cidade',
            'uf',
            'telefone',
            'email',
            'tabeliao',
            'is_ativo'
        ];
        
        /* Caminho aonde arquivo deve ser encontrado*/
        $path = \Yii::getAlias('@app/web/arquivo/cartorios.xlsx');
        $reader = new \SpreadsheetReader_XLSX($path);
        
        $contadorSave = 0;
        $contador = 0;
        $arrDuplicado = [];
        
        
        foreach ($reader as $key => $row)
        {
            /* Ignoro o Header do Arquivo Excel*/
            if($key == 0)continue;
            
            /* Populo os dados*/
            $objCartorio = $this->_populateModel($attrMapExcel, $row);
            
            /* Existe esse cara na base?*/
            $exists = Cartorio::find()->where(['documento' => $objCartorio->documento])->exists();
            
            if(!$exists){
                if($objCartorio->save()){
                    echo 'Salvo '.$objCartorio->documento.PHP_EOL;
                    $contadorSave++;
                }else{
                    var_dump($objCartorio->getErrors());exit;
                }
            }else{
                $arrDuplicado[] = $objCartorio->documento;
            }
            $contador++;
        }
        
        echo PHP_EOL;
        echo 'Quantidade a ser importada: '.$contador.PHP_EOL;
        echo 'Importados: '.$contadorSave.PHP_EOL;
        echo 'Duplicados: '.count($arrDuplicado).PHP_EOL;
        
        return ExitCode::OK;
    }
    
    
    /**
     * Faço a leitura do arquivo xml do CNJ
     * e atualizo nossa base de dados.
     */
    public function actionAtualizaBase()
    {
        
        /* Caminho aonde arquivo deve ser encontrado*/
        $path = \Yii::getAlias('@app/web/arquivo/atualizacao.xml');

        /* Leio o Xml*/
        $read = simplexml_load_file($path);
        
        /* Fiz um mapeamento de posição,
         * atributo para facilitar na leitura
         *  do código
         */
        $attrMapXml = array_keys(get_object_vars($read->cartorio));
        
        
        $contadorSave = 0;
        $contador = 0;
        
        /*Primeiramente recupero o cartório em minha base*/
        foreach ($read as $row){
            
            /*Remove 0 a esquerda*/
            $strDocumento = ltrim($row->documento, '0');
            
            $cartorio = Cartorio::findOne(['documento' => $strDocumento]);
            
            /*Encontrou o cartório, populo com os novos dados*/
            if($cartorio){
                $cartorio = $this->_populateModel($attrMapXml, $row , $cartorio);
                if($cartorio->save()){
                    $contadorSave++;
                }
            }
            
            $contador++;
        }
        
        echo PHP_EOL;
        echo 'Quantidade a ser atualizada: '.$contador.PHP_EOL;
        echo 'Atualizados: '.$contadorSave.PHP_EOL;
    }
    
    
    /**
     * Função responsável por enviar emails
     * @param unknown $email
     */
    public function actionEnviaEmail()
    {
        /*Recupero todo mundo que possui email e envio uma campanha*/
        
        foreach (Cartorio::find()->each(5) as $cartorio){
            if($cartorio->email){
                echo $cartorio->email.PHP_EOL;
                /*\Yii::$app->mailer->compose()
                ->setTo($cartorio->email)
                ->setFrom('teste@gmail.com')
                ->setSubject('Assunto')
                ->setTextBody('Corpo');
                //->send(); Apenas para teste*/
            }
        }
        
        
        
    }
}
