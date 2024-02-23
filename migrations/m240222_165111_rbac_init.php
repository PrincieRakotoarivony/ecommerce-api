<?php

use yii\db\Migration;

/**
 * Class m240222_165111_rbac_init
 */
class m240222_165111_rbac_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $adminRole = $auth->createRole('admin');
        $auth->add($adminRole);

        $clientRole = $auth->createRole('client');
        $auth->add($clientRole);
        // $auth->assign($adminRole, $userId);
        // $roles = $auth->getRolesByUser($userId);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240222_165111_rbac_init cannot be reverted.\n";
        $auth = Yii::$app->authManager;
        $auth->remove($auth->getRole('client'));
        $auth->remove($auth->getRole('admin'));

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240222_165111_rbac_init cannot be reverted.\n";

        return false;
    }
    */
}
