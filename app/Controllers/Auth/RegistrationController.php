<?php

namespace App\Controllers\Auth;

use Framework\View;
use App\Models\User;
use App\Services\Request;
use HybridLogic\Validation\Rule;
use App\Repository\UserRepository;
use HybridLogic\Validation\Validator;

class RegistrationController
{
    public $errors;
    private $validator;

    public function __construct()
    {
        $this->validator = new Validator();
        $this->validator
            ->add_rule('login', new Rule\NotEmpty())
            ->add_rule('email', new Rule\NotEmpty())
            ->add_rule('password', new Rule\NotEmpty())
            ->add_rule('password', new Rule\MinLength(6));
    }

    public function index()
    {
        if (Request::type() != 'POST') {
            View::render('register');
        }

        $_POST['avatar'] = '/avatars/no-avatar.png';
        $_POST['about'] = '';
        $_POST['name'] = '';
        $_POST['password'] = User::hashPassword($_POST['password']);

        if (!$this->validator->is_valid($_POST)) {
            $errors = $this->validator->get_errors();
            View::render('register', ['errors' => $errors, 'data' => $this->validator->get_data()]);
        }

        if (!(new UserRepository())->createNewUser($this->validator->get_data())) {
            View::render('register', ['error' => 'User already exist`s']);
        }

        View::render('register', ['success' => 'Cool! Now you can login.']);
    }
}