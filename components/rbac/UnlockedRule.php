<?php
namespace app\components\rbac;

use yii\rbac\Rule;

/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 24/01/2018
 * Time: 14:32
 */


/**
 * Class LockedRule
 * @package app\components\rbac
 * @extends yii\rbac\Rule
 *
 * The model must have created_by (foreign key to user id)
 *
 *
 *  'access' => [
 *      'class' => AccessControl::className(),
 *      'ruleConfig' => [
 *          'class' => AccessRule::className(),
 *      ],
 *      'rules' => [
 *          [
 *              'actions' => ['update'],
 *              'allow' => true,
 *              'roles' => ['update-datacard'],
 *              'roleParams' => function() {
 *                  return ['model' => Datacard::findOne(Yii::$app->request->get('id'))];
 *              },
 *          ],
 *      ],
 *  ],
 */
class UnlockedRule extends Rule
{
    public $name = 'isUnlocked';

    /**
     * @param string|int $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return bool a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        $truth=isset($params['model']) ? $params['model']->isLocked != true : false;
        return $truth;
    }
}