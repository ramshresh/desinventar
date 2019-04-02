<?php

use yii\db\Migration;

/**
 * Class m180124_201315_addcolumn_locked_at_for_table_datacards
 */
class m180124_201315_addcolumn_locked_at_for_table_datacards extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('datacards', 'locked_at', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('datacards','locked_at');
        echo "m180124_201315_addcolumn_locked_at_for_table_datacards  reverted successfully.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180124_201315_addcolumn_locked_at_for_table_datacards cannot be reverted.\n";

        return false;
    }
    */
}
