<?php
namespace common\traits;

use common\models\User;
use yii\helpers\VarDumper;

trait CreateUserTrait
{
    public $signUserRole;
    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }


        $this->setPassword($this->password);
        $this->generateAuthKey();
        $this->generateEmailVerificationToken();
        $this->setGroup($this->signUserRole);

        return $this->save() && $this->sendEmail($this);

    }
}