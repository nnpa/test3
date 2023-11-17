<?php

use yii\db\Migration;

/**
 * Class m231117_124648_create_twit
 */
class m231117_124648_create_twit extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'content' => $this->text(),
            'username' => $this->string()->notNull(),
            'createdAt' => $this->integer(),
            'categoryId' => $this->integer(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231117_124648_create_twit cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231117_124648_create_twit cannot be reverted.\n";

        return false;
    }
    */
}
