<?php

use yii\db\Migration;

/**
 * Class m181108_050203_banco
 */
class m181108_050203_banco extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('cartorio', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%cartorio}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'nome' => 'VARCHAR(255) NULL',
                    'razao' => 'VARCHAR(255) NULL',
                    'documento' => 'VARCHAR(15) NULL',
                    'cep' => 'VARCHAR(8) NULL',
                    'endereco' => 'VARCHAR(500) NULL',
                    'bairro' => 'VARCHAR(255) NULL',
                    'cidade' => 'VARCHAR(255) NULL',
                    'uf' => 'VARCHAR(2) NULL',
                    'telefone' => 'VARCHAR(12) NULL',
                    'email' => 'VARCHAR(255) NULL',
                    'tabeliao' => 'VARCHAR(255) NULL',
                    'is_ativo' => 'INT(11) NULL',
                ], $tableOptions_mysql);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `cartorio`');
        $this->execute('SET foreign_key_checks = 1;');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181108_050203_banco cannot be reverted.\n";

        return false;
    }
    */
}
