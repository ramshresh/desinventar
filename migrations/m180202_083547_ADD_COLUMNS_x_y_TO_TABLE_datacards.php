<?php

use yii\db\Migration;

/**
 * Class m180202_083547_ADD_COLUMNS_x_y_TO_TABLE_datacards
 */
class m180202_083547_ADD_COLUMNS_x_y_TO_TABLE_datacards extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('datacards', 'latitude', $this->double());
        $this->addColumn('datacards', 'longitude', $this->double());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('datacards','x');
        $this->dropColumn('datacards','y');
        echo "m180202_083547_ADD_COLUMNS_x_y_TO_TABLE_datacards reverted succesfully.. dropped columns x and y.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180202_083547_ADD_COLUMNS_x_y_TO_TABLE_datacards cannot be reverted.\n";

        return false;
    }
    */
}
