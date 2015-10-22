<?php

namespace app\models;

use cs\base\DbRecord;

class Request extends DbRecord
{
    const TABLE = 'tg_requests';

    const STATUS_1_WAIT       = 1;
    const STATUS_2_PAID       = 2;
    const STATUS_3_PRODUCTION = 3;
    const STATUS_4_OTGRUZKA   = 4;
    const STATUS_5_TRANSPORT  = 5;
    const STATUS_6_FINISH     = 6;

    public static $statusList = [
        self::STATUS_1_WAIT       => 'Ожидает обработки',
        self::STATUS_2_PAID       => 'Выставлен счет',
        self::STATUS_3_PRODUCTION => 'Изготовление',
        self::STATUS_4_OTGRUZKA   => 'Отгрузка',
        self::STATUS_5_TRANSPORT  => 'Транспортировка',
        self::STATUS_6_FINISH     => 'Получено',
    ];
}
