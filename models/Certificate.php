<?php

namespace app\models;

use app\services\Subscribe;
use cs\services\BitMask;
use yii\db\Query;

class Certificate extends \cs\base\DbRecord
{
    const TABLE = 'rod_cert';

}