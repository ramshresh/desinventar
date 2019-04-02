<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 25/01/2018
 * Time: 04:04
 */

namespace app\components\rbac;


use yii\rbac\Rule;

class OwnerAndUnlockedRule extends Rule
{
    public $name = 'isOwnerAndUnlocked';

    public function execute($user, $item, $params)
    {
        $isOwner = new OwnerRule();
        $isUnlocked = new UnlockedRule();
        return $isOwner->execute($user, $item, $params) && $isUnlocked->execute($user, $item, $params);
    }
}