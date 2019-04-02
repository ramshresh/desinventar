<?php

use yii\db\Migration;

/**
 * Class m180202_092751_ADD_COLUMNS_et_id_TO_TABLE_datacards
 */
class m180202_092751_ADD_COLUMNS_et_id_TO_TABLE_datacards extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('et_id', 'x', $this->double());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('datacards','et_id');
        echo "m180202_092751_ADD_COLUMNS_et_id_TO_TABLE_datacards reverted. Dropped column et_id\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180202_092751_ADD_COLUMNS_et_id_TO_TABLE_datacards cannot be reverted.\n";

        return false;
    }
    */
}
