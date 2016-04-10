<?php

namespace app\models\Form;

use app\models\NewsItem;
use app\models\User;
use app\services\GsssHtml;
use cs\services\Str;
use cs\services\VarDumper;
use Yii;
use yii\base\Model;
use cs\Widget\FileUpload3\FileUpload;
use yii\db\Query;
use yii\helpers\Html;
use yii\widgets\MaskedInput;

/**
 */
class Certificate extends \cs\base\BaseForm
{
    const TABLE = 'rod_cert';

    public $id;
    public $name;
    public $user_id;
    public $datetime_given;
    public $file;
    public $passport_num;
    public $passport_date;
    public $passport_vidan;

    function __construct($fields = [])
    {
        static::$fields = [
            [
                'name',
                'ФИО',
                1,
                'string'
            ],
            [
                'passport_num',
                'Паспорт серия и номер',
                0,
                'string', ['length' => 11],
                'widget' => [MaskedInput::className(), [
                    'mask' => '9999 999999',
                ]]
            ],
            [
                'passport_date',
                'Паспорт дата выдачи',
                0,
                'cs\Widget\DatePicker\Validator',
                'widget' => ['cs\Widget\DatePicker\DatePicker']
            ],
            [
                'passport_vidan',
                'Паспорт выдавший орган',
                0,
                'string', ['max' => 255]
            ],
            [
                'file',
                'Гарантия',
                0,
                'default',
                'widget' => [
                    FileUpload::className(),
                    [
                        'options' => [
                            'small' => \app\services\GsssHtml::$formatIcon
                        ]
                    ]
                ]
            ],
        ];
        parent::__construct($fields);
    }

    public function insert($fieldsCols = null)
    {
        $row = parent::insert([
            'beforeInsert' => function ($fields) {
                $fields['datetime_given'] = time();
                $fields['user_id'] = Yii::$app->user->id;

                return $fields;
            },
        ]);

        return $row;
    }
}
