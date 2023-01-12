<?php

namespace app\models;

class RegForm extends User
{
public $confirm_password;
public $agree;

public function rules()
{
    return [
        [['name', 'surname', 'login', 'email', 'password', 'confirm_password'], 'required'],
        [['name'], 'match', 'pattern'=>'/^[А-ЯЁа-яё\s\-]{1,}$/u', 'message'=>'Используйте минимум 1 русскую букву, пробел или тире'],
        [['surname'], 'match', 'pattern'=>'/^[А-ЯЁа-яё\s\-]{1,}$/u', 'message'=>'Используйте минимум 1 русскую букву, пробел или тире'],
        [['patronymic'], 'match', 'pattern'=>'/^[А-ЯЁа-яё\s\-]{1,}$/u', 'message'=>'Используйте минимум 1 русскую букву, пробел или тире'],
        [['login'], 'match', 'pattern'=>'/^[A-Za-z0-9\-]{6,}$/u', 'message'=>'Используйте минимум 6 латинских букв, цифры или тире'],
        [['email'], 'email'],
        [['confirm_password'], 'compare', 'compareAttribute'=>'password'],
        [['agree'], 'compare', 'compareValue'=>true, 'message'=>''],
        [['is_admin'], 'integer'],
        [['email'], 'unique'],
        [['name', 'surname', 'patronymic', 'login', 'email', 'password'], 'string', 'max' => 255],
    ];
}
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'login' => 'Логин',
            'email' => 'Email',
            'password' => 'Пароль',
            'is_admin' => 'Is Admin',
            'confirm_password' => 'Повторить пароль',
            'agree' => 'Подтвердите согласие на обработку персональных данных',
        ];
    }
}