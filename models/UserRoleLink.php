<?php

namespace app\models;

use app\services\Subscribe;
use cs\Application;
use cs\services\VarDumper;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * Class UserRoleLink
 *
 * @package app\models
 */

class UserRoleLink extends \cs\base\DbRecord
{
    const TABLE = 'gs_users_role_link';
}