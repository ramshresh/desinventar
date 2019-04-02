<?php

use yii\db\Migration;

/**
 * Class m180125_050023_CREATE_CONSTRAINT_unique_data_card_no
 */
class m180125_050023_CREATE_CONSTRAINT_unique_data_card_no extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'idx-unique-data_card_no',
            'datacards',
            'data_card_no',
            1
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-unique-data_card_no','datacards');
        echo "m180125_050023_CREATE_CONSTRAINT_unique_data_card_no successfully reverted--> removed unique constraint index idx-unique-data_card_no.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180125_050023_CREATE_CONSTRAINT_unique_data_card_no cannot be reverted.\n";

        return false;
    }
    */
}
