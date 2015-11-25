<?php

return [
    'subscribe/mail'                                               => 'subscribe/mail',
    'subscribe/activate/<code:\\w+>'                               => 'subscribe/activate',

    'cabinet/objects'                                              => 'cabinet/requests',
    'cabinet/profile'                                              => 'cabinet/profile',

    'password/recover'                                             => 'auth/password_recover',
    'password/recover/activate/<code:\\w+>'                        => 'auth/password_recover_activate',
    'registration/<code:\\w+>'                                     => 'auth/registration_referal',

    'captcha'                                                      => 'site/captcha',


    'checkBoxTreeMask/add'                                         => 'check_box_tree_mask/add',
    'checkBoxTreeMask/addInto'                                     => 'check_box_tree_mask/add_into',
    'checkBoxTreeMask/delete'                                      => 'check_box_tree_mask/delete',

    'upload/upload'                                                => 'upload/upload',
    'upload/HtmlContent2'                                          => 'html_content/upload',

    'admin/subscribe'                                              => 'admin_subscribe/index',
    'admin/subscribe/add'                                          => 'admin_subscribe/add',
    'admin/subscribe/send'                                         => 'admin_subscribe/send',
    'admin/subscribe/delete'                                       => 'admin_subscribe/delete',
    'admin/subscribe/add/simple'                                   => 'admin_subscribe/add_simple',
    'admin/subscribe/<id:\\d+>'                                    => 'admin_subscribe/view',
    'admin/subscribe/<id:\\d+>/edit'                               => 'admin_subscribe/edit',

    '/'                                                            => 'site/index',
    'log'                                                          => 'site/log',
    'activate/<code:\\w+>'                                         => 'site/activate',
    'logDb'                                                        => 'site/log_db',
    'contact'                                                      => 'site/contact',
    'login'                                                        => 'site/login',
    'logout'                                                       => 'site/logout',
    'production/<id:\\d+>'                                         => 'site/production_item',
    'diller'                                                       => 'site/diller',
    'articles'                                                     => 'site/articles',
    'articles/<year:\\d{4}>/<month:\\d{2}>/<day:\\d{2}>/<id:\\w+>' => 'site/article',


    'in'                                                           => 'site/in',
    'out'                                                          => 'site/out',
    'about'                                                        => 'site/about',
    'comunity'                                                     => 'site/comunity',
    'trasfere'                                                     => 'site/trasfere',

    'buy/<id:\\d+>'                                                => 'site/buy',

    'admin/articleList'                                            => 'admin_article/index',
    'admin/articleList/add'                                        => 'admin_article/add',
    'admin/articleList/addFromPage'                                => 'admin_article/add_from_page',
    'admin/articleList/<id:\\d+>/delete'                           => 'admin_article/delete',
    'admin/articleList/<id:\\d+>/edit'                             => 'admin_article/edit',
    'admin/articleList/<id:\\d+>/subscribe'                        => 'admin_article/subscribe',


    'admin/requests'                                               => 'admin_requests/index',
    'admin/requests/<id:\\d+>/view'                                => 'admin_requests/view',
];