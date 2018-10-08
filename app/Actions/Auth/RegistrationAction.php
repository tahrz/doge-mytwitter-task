<?php

namespace App\Actions\Auth;

use App\Models\User;
use Framework\View;
use Framework\Action;
use App\Repository\UserRepository;
use App\Validator\RegistrationValidator;

/**
 * Class RegistrationAction
 *
 * @package App\Actions\Auth
 */
class RegistrationAction extends Action
{
    /**
     * @param RegistrationValidator $registrationValidator
     */
    public function __invoke(RegistrationValidator $registrationValidator)
    {
        $this->validationProcess($registrationValidator);
        $this->newUserCreate();
        View::render('register', ['error' => 'User already exist`s']);
    }

    /**
     * @param RegistrationValidator $registrationValidator
     */
    private function validationProcess(RegistrationValidator $registrationValidator)
    {
        if (count($registrationValidator->validate($this->request->request->all()))) {
            View::render('register', ['errors' => $registrationValidator->gerErrors(), 'data' => $this->request->request->all()]);
        }
    }

    private function newUserCreate()
    {
        $this->request->request->set('password', User::hashPassword($this->request->request->all()['password']));

        if (UserRepository::createNew($this->request->request->all())) {
            View::render('register', ['success' => 'Cool! Now you can login.']);
        }
    }
}