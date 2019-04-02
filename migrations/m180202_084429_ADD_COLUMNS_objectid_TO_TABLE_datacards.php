<?php

use yii\db\Migration;

/**
 * Class m180202_084429_ADD_COLUMNS_objectid_TO_TABLE_datacards
 */
class m180202_084429_ADD_COLUMNS_objectid_TO_TABLE_datacards extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('objectid', 'x', $this->double());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('datacards','objectid');
        echo "m180202_084429_ADD_COLUMNS_objectid_TO_TABLE_datacards reverted. Dropped column objectid.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180202_084429_ADD_COLUMNS_objectid_TO_TABLE_datacards cannot be reverted.\n";

        return false;
    }
    */
}
