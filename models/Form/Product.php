<?php

namespace app\models\Form;

use cs\base\BaseForm;
use cs\base\DbRecord;
use cs\Widget\FileUpload2\FileUpload;

class Product extends BaseForm
{
    const TABLE = 'tg_products';

    public $id;
    public $name;
    public $image;
    public $v;
    public $kvt;
    public $price;
    public $content;

    public function __construct($config = [])
    {
        self::$fields = [
            [
                'name', 'Название', 1, 'string'
            ],
            [
                'v', 'Напряжение', 1, 'integer'
            ],
            [
                'kvt', 'Мощность', 1, 'integer'
            ],
            [
                'price', 'Цена', 0, 'integer'
            ],
            [
                'image',
                'Картинка',
                0,
                'string',
                'widget' => [
                    FileUpload::className(),
                    [
                        'options' => [
                            'small' => [
                                370,
                                370,
                                \cs\Widget\FileUpload2\FileUpload::MODE_THUMBNAIL_CUT
                            ]
                        ]
                    ]
                ]
            ],

            [
                'content',
                'Описание',
                0,
                'string',
                'widget' => [
                    'cs\Widget\HtmlContent\HtmlContent',
                    [
                    ]
                ]
            ],
        ];
        parent::__construct($config);
    }
}
