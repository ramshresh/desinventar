<?php

use yii\db\Migration;

/**
 * Class m180125_053209_ADD_COLUMN_uuid_FOR_TABLE_datacards
 */
class m180125_053209_ADD_COLUMN_uuid_FOR_TABLE_datacards extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('datacards', 'uuid', $this->string(16));
        $this->createIndex(
            'idx-unique-uuid',
            'datacards',
            'uuid(16)',
            1
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-unique-uuid','datacards');
        $this->dropColumn('datacards','uuid');
        echo "m180125_053209_ADD_COLUMN_uuid_FOR_TABLE_datacards successfully reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180125_053209_ADD_COLUMN_uuid_FOR_TABLE_datacards cannot be reverted.\n";

        return false;
    }
    */
}
