<?php

namespace App\Validator;

use Framework\Validator;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class RegistrationValidator
 *
 * @package App\Validator
 */
class RegistrationValidator extends Validator
{
    /**
     * RegistrationValidator constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->rules = [
            'email' => [
                new Email(),
                new NotBlank(),
            ],
            'login' => new NotBlank(),
            'password' => [
                new Length(['min' => 6]),
                new NotBlank()
            ]
        ];
    }
}