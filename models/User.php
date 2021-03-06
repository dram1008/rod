<?php

namespace app\models;

use app\services\RegistrationDispatcher;
use cs\Application;
use cs\services\Security;
use cs\services\SitePath;
use cs\services\VarDumper;
use Imagine\Image\Box;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\helpers\Url;
use cs\services\UploadFolderDispatcher;
use yii\imagine\Image;
use \Imagine\Image\ManipulatorInterface;

class User extends \cs\base\DbRecord implements \yii\web\IdentityInterface
{
    public $roles;

    const USER_ROLE_VASUDEV_BAGAVAN = 4;
    const USER_ROLE_MODERATOR = 5;
    const USER_ROLE_AGENCY_CERT = 6;
    const USER_ROLE_ADMIN_AURA = 7;

    use UserCache;

    const TABLE = 'gs_users';

    /**
     * Возвращает кошелек
     *
     * @return \app\models\Piramida\Wallet
     */
    public function getWallet()
    {
        return Wallet::findOne($this->getId());
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return self::find($id);
    }

    public function getLink($isScheme = false)
    {
        return Url::to(['site/user', 'id' => $this->getId()], $isScheme);
    }

    /**
     * @return \app\models\Zvezdnoe
     */
    public function getZvezdnoe()
    {
        $i = $this->getField('zvezdnoe', '');
        if ($i == '') {
            $i = "{data:''}";
        }

        return Zvezdnoe::set($i);
    }

    /**
     * Возвращает все роли пользователя, если подключен кеш то использует его
     *
     * @return array
     */
    public function getRoles()
    {
        if (is_null($this->roles)) {
            if (method_exists($this, 'getRolesCache')) {
                $this->roles = $this->getRolesCache();
            } else {
                $this->roles = $this->_getRoles();
            }
        }
        return $this->roles;
    }

    /**
     * Возвращает все роли пользователя
     *
     * @return array
     */
    public function _getRoles()
    {
        return UserRoleLink::query(['user_id' => $this->getId()])->select('role_id')->column();
    }

    /**
     * Проверяет есть ли роль у пользователя?
     * @param int $role
     * @return bool
     */
    public function hasRole($role)
    {
        return in_array($role, $this->getRoles());
    }

    public function hasBirthPlace()
    {
        return
            (
                (!is_null($this->getField('birth_country')) && !is_null($this->getField('birth_town'))) ||
                ($this->get('birth_place', '') != '')
            );
    }

    /**
     * Возвращает место рождения в виде строки
     *
     * @return string
     */
    public function getBirthPlace()
    {
        if ($place = $this->get('birth_place', '')) {
            return $place;
        }
        $c = $this->getField('birth_country');
        $t = $this->getField('birth_town');
        $arr = [];
        if ($c) {
            $country = HD::find($c);
            if ($country) {
                $arr[] = $country->getField('title');
            }
        }
        if ($t) {
            $town = HDtown::find($t);
            if ($town) {
                $arr[] = $town->getField('title');
            }
        }
        if (count($arr) > 0) {
            return join(', ', $arr);
        } else {
            return '';
        }
    }

    /**
     * @param \app\models\Zvezdnoe $z
     *
     *
     */
    public function setZvezdnoe($z)
    {
        $this->update(['zvezdnoe' => $z->__toString()]);
    }

    public function hasZvezdnoe()
    {
        $i = $this->getField('zvezdnoe', '');

        return ($i != '');
    }

    /**
     * Заполнены ли данные о Дизайне Человека?
     *
     * @return bool
     */
    public function hasHumanDesign()
    {
        return $this->getField('human_design', '') != '';
    }

    /**
     * Заполнены ли данные о Дизайне Человека?
     *
     * @return \app\models\HumanDesign
     */
    public function getHumanDesign()
    {
        $data = $this->getField('human_design');
        if (is_null($data)) {
            return null;
        }
        $data = json_decode($data);

        return new \app\models\HumanDesign($data);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param  string $username
     *
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::find(['email' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return md5($this->getEmail() . '12345');
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() == $authKey;
    }

    /**
     * Validates password
     *
     * @param  string $password password to validate
     *
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return password_verify($password, $this->getField('password'));
    }

    public static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * Регистрирует пользователей
     *
     * @param $email
     * @param $password
     *
     * @return static
     */
    public static function registration($email, $password)
    {
        $email = strtolower($email);
        $fields = [
            'email'        => $email,
            'password'     => self::hashPassword($password),
            'is_active'    => 0,
            'is_confirm'   => 0,
            'datetime_reg' => gmdate('YmdHis'),
            'referal_code' => Security::generateRandomString(20),
        ];
        // добавляю поля для подписки
        foreach (\app\services\Subscribe::$userFieldList as $field) {
            $fields[$field] = 1;
        }
        \Yii::info('REQUEST: ' . \yii\helpers\VarDumper::dumpAsString($_REQUEST), 'gs\\user_registration');
        \Yii::info('Поля для регистрации: ' . \yii\helpers\VarDumper::dumpAsString($fields), 'gs\\user_registration');
        $user = self::insert($fields);
        $fields = RegistrationDispatcher::add($user->getId());
        \cs\Application::mail($email, 'Подтверждение регистрации', 'registration', [
            'url'      => Url::to([
                'auth/registration_activate',
                'code' => $fields['code']
            ], true),
            'user'     => $user,
            'datetime' => \Yii::$app->formatter->asDatetime($fields['date_finish'])
        ]);

        return $user;
    }

    /**
     * Регистрирует пользователей с высыланием пароля
     *
     * @param $email
     * @param $password
     *
     * @return static
     */
    public static function registration_password($email, $password)
    {
        $email = strtolower($email);
        $fields = [
            'email'        => $email,
            'password'     => self::hashPassword($password),
            'is_active'    => 0,
            'is_confirm'   => 0,
            'datetime_reg' => gmdate('YmdHis'),
            'referal_code' => Security::generateRandomString(20),
        ];
        // добавляю поля для подписки
        foreach (\app\services\Subscribe::$userFieldList as $field) {
            $fields[$field] = 1;
        }
        $user = self::insert($fields);
        $fields = RegistrationDispatcher::add($user->getId());
        \cs\Application::mail($email, 'Подтверждение регистрации', 'registration_password', [
            'url'      => Url::to([
                'auth/registration_activate',
                'code' => $fields['code']
            ], true),
            'user'     => $user,
            'datetime' => \Yii::$app->formatter->asDatetime($fields['date_finish']),
            'password' => $password,
        ]);

        return $user;
    }

    public function activate()
    {
        $this->update([
            'is_active'         => 1,
            'is_confirm'        => 1,
            'datetime_activate' => gmdate('YmdHis'),
        ]);
    }

    /**
     * @param string $password некодированный пароль
     *
     * @return bool
     */
    public function setPassword($password)
    {
        return $this->update([
            'password' => self::hashPassword($password)
        ]);
    }

    /**
     * Устанавливает новый аватар
     * Картинка должна быть квадратной
     * Размер 300х300
     *
     * @param string $content содержимое файла аватара
     * @param string $extension расширение файла
     *
     * @return \cs\services\SitePath
     */
    public function setAvatarAsContent($content, $extension)
    {
        $path = UploadFolderDispatcher::createFolder('FileUpload2', self::TABLE, $this->getId());
        $path->addAndCreate('small');
        $path->add('avatar.' . $extension);

        file_put_contents($path->getPathFull(), $content);
        $this->update([
            'avatar' => $path->getPath(),
        ]);

        return $path;
    }

    /**
     * Устанавливает новый аватар из адреса интернет
     *
     * @param string $url полный url на картинку, может быть прямоугольной
     * @param string $extension расширение которое должно быть в результируеющем файле
     *
     * @return \cs\services\SitePath
     */
    public function setAvatarFromUrl($url, $extension = null)
    {
        if (is_null($extension)) {
            $info = parse_url($url);
            $pathinfo = pathinfo($info['path']);
            $extension = $pathinfo['extension'];
        }
        \Yii::info(\yii\helpers\VarDumper::dumpAsString($url), 'gs\\user');
        $image = new Image();
        $imageFileName = \Yii::getAlias('@runtime/temp_images');
        FileHelper::createDirectory($imageFileName);
        $imageFileName .= DIRECTORY_SEPARATOR . time() . '_' . Security::generateRandomString(10) . '.' . $extension;
        \Yii::info(\yii\helpers\VarDumper::dumpAsString($imageFileName), 'gs\\user');

        $image = $image->getImagine()->load(file_get_contents($url));
        $image = $this->expandImage($image, 300, 300, ManipulatorInterface::THUMBNAIL_OUTBOUND);
        $image->thumbnail(new Box(300, 300), ManipulatorInterface::THUMBNAIL_OUTBOUND)->save($imageFileName, ['format' => 'jpg', 'quality' => 100]);

        return $this->setAvatarAsContent(file_get_contents($imageFileName), $extension);
    }

    /**
     * Расширяет маленькую картинку по заданной стратегии
     *
     * @param \Imagine\Image\ImageInterface $image
     * @param int $widthFormat
     * @param int $heightFormat
     * @param int $mode
     *
     * @return \Imagine\Image\ImageInterface
     */
    protected static function expandImage($image, $widthFormat, $heightFormat, $mode)
    {
        $size = $image->getSize();
        $width = $size->getWidth();
        $height = $size->getHeight();
        if ($width < $widthFormat || $height < $heightFormat) {
            // расширяю картинку
            if ($mode == ManipulatorInterface::THUMBNAIL_OUTBOUND) {
                if ($width < $widthFormat && $height >= $heightFormat) {
                    $size = $size->widen($widthFormat);
                } else if ($width >= $widthFormat && $height < $heightFormat) {
                    $size = $size->heighten($heightFormat);
                } else if ($width < $widthFormat && $height < $heightFormat) {
                    // определяю как расширять по ширине или по высоте
                    if ($width / $widthFormat < $height / $heightFormat) {
                        $size = $size->widen($widthFormat);
                    } else {
                        $size = $size->heighten($heightFormat);
                    }
                }
                $image->resize($size);
            } else {
                if ($width < $widthFormat && $height >= $heightFormat) {
                    $size = $size->heighten($heightFormat);
                } else if ($width >= $widthFormat && $height < $heightFormat) {
                    $size = $size->widen($widthFormat);
                } else if ($width < $widthFormat && $height < $heightFormat) {
                    // определяю как расширять по ширине или по высоте
                    if ($width / $widthFormat < $height / $heightFormat) {
                        $size = $size->heighten($heightFormat);
                    } else {
                        $size = $size->widen($widthFormat);
                    }
                }
                $image->resize($size);
            }
        }

        return $image;
    }

    /**
     * Возвращает аватар
     * Если не установлен то возвращает заглушку
     *
     * @return string
     */
    public function getAvatar($isFullPath = false)
    {
        $avatar = $this->getField('avatar');
        if ($avatar . '' == '') {
            return \Yii::$app->assetManager->getBundle('app\assets\App\Asset')->baseUrl . '/images/iam.png';
        }
        return Url::to($avatar, $isFullPath);
    }

    /**
     * Имеет ли профиль аватар?
     *
     * @return bool
     * true - имеет
     * false - не имеет
     */
    public function hasAvatar()
    {
        return ($this->getField('avatar') . '' != '');
    }

    /**
     * Возвращает почту
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->getString('email');
    }

    /**
     * Возвращает пол
     *
     * 0 - женщина
     * 1 - мужчина
     *
     * @return int|null
     */
    public function getGender()
    {
        return $this->getField('gender', null);
    }

    /**
     * Возвращает Имя и Фамилию через пробел
     *
     * @return string
     */
    public function getName2()
    {
        $first = $this->getString('name_first');
        $last = $this->getString('name_last');
        $arr = [];
        if ($first) {
            $arr[] = $first;
        }
        if ($last) {
            $arr[] = $last;
        }

        return join(' ', $arr);
    }

    /**
     * Возвращает значение из $this->fields, если значение = null то возвращается пустая строка
     *
     * @param $name
     *
     * @return mixed
     */
    public function getString($name)
    {
        return ArrayHelper::getValue($this->fields, $name, '');
    }

    /**
     * Пользователь админ?
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->getField('is_admin', 0) == 1;
    }

    /**
     * @param int $roleId
     *
     * @return \yii\db\Query
     */
    public static function getQueryByRole($roleId)
    {
        return self::query()
            ->innerJoin('gs_users_role_link', 'gs_users_role_link.user_id = gs_users.id')
            ->andWhere(['gs_users_role_link.role_id' => $roleId]);
    }

    /**
     * Отправляет пиьсмо по адресату, если пользователь не являетя тем который в системе, то устанавливается его timeZone
     *
     * @param $subject
     * @param $view
     * @param $options
     * @return bool
     */
    public function mail($subject, $view, $options)
    {
        $timeZone = \Yii::$app->timeZone;
        $isChange = false;
        if (!\Yii::$app->user->isGuest) {
            if (\Yii::$app->user->id != $this->getId()) {
                $tz = \Yii::$app->user->identity->get('time_zone', '');
                if (!is_null($tz)) {
                    if ($tz != '') {
                        \Yii::$app->timeZone = $tz;
                        $isChange = true;
                    }
                }
            }
        } else {
            $tz = \Yii::$app->user->identity->get('time_zone', '');
            if (!is_null($tz)) {
                if ($tz != '') {
                    \Yii::$app->timeZone = $tz;
                    $isChange = true;
                }
            }
        }
        $result = Application::mail($this->getEmail(), $subject, $view, $options);
        if ($isChange) \Yii::$app->timeZone = $timeZone;

        return $result;
    }
}
