<?php
/**
 * UserCache
 *
 * Занимается кешированием данных пользователя
 * Имя ключа = 'user/{id}'
 *
 * При обновлении данных пользователя [[update()]] кеш сбрасывается
 */

namespace app\models;

use app\services\UsersInCache;
use yii\helpers\VarDumper;

/**
 *
 *
 * Если при функции update() происходит обновление полей UsersInCache::$fields, то происходит обновление в кеше
 * app\services\UsersInCache
 *
 * Class UserCache
 * @package app\models
 *
 * Кеширует данные в сессии
 *
 */
trait UserCache
{
    /**
     * Ищет строку по идентификатору
     *
     * @param integer|array $id идентификатор пользователя
     *
     * @return \app\models\User
     */
    public static function find($id)
    {
        if (is_array($id)) {
            return parent::find($id);
        }

        $keyName = 'user/' . $id;
        $user = \Yii::$app->session->get($keyName, false);

        if ($user === false) {
            $user = parent::_find($id);
            \Yii::$app->session->set($keyName, $user);
        }
        if (is_null($user)) {
            return null;
        }

        return new static($user);
    }

    /**
     * Возвращает все роли пользователя, и сохраняет для дальнейшего использования
     *
     * @return array
     */
    public function getRolesCache()
    {
        if (is_null($this->roles)) {
            $fields = $this->getFields();
            if (isset($fields['roles'])) {
                $this->roles = $fields['roles'];
            } else {
                $this->roles = $this->_getRoles();
                $fields['roles'] = $this->roles;
                $this->setCache($fields);
            }
        }

        return $this->roles;
    }

    /**
     * Обновляет поля в базе, в $this->fields, сбрасывает кеш
     * @param $fields
     *
     * @return bool
     */
    public function update($fields)
    {
        $keyName = 'user/' . $this->getId();
        \Yii::$app->session->remove($keyName);

        $isUpdateUserInCache = false;
        foreach ($fields as $k => $v) {
            $this->fields[$k] = $v;
            if (in_array($k, UsersInCache::$fields)) {
                $isUpdateUserInCache = true;
            }
        }
        if ($isUpdateUserInCache) UsersInCache::saveUser($this);
        parent::update($fields);

        return true;
    }

    /**
     * Сохраняет данные в кеше
     *
     * @param $fields
     */
    public function setCache($fields)
    {
        $keyName = 'user/' . $fields['id'];
        \Yii::$app->session->set($keyName, $fields);
    }

    public function cacheClear()
    {
        $keyName = 'user/' . $this->getId();
        \Yii::$app->session->remove($keyName);
    }
}