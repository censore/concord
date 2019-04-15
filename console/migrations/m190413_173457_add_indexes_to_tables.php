<?php

use yii\db\Migration;

/**
 * Class m190413_173457_add_indexes_to_tables
 */
class m190413_173457_add_indexes_to_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-user_group-groups_id',
            'user',
            'group_id',
            'groups',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190413_173457_add_indexes_to_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190413_173457_add_indexes_to_tables cannot be reverted.\n";

        return false;
    }
    */
}
