<?php

namespace Framework;

use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Collection;

/**
 * Class Validator
 *
 * @package Framework
 */
class Validator
{
    /**
     * @var \Symfony\Component\Validator\Validator\ValidatorInterface
     */
    public $rules;
    private $validator;
    private $validations;

    /**
     * Validator constructor.
     */
    public function __construct()
    {
        $this->validator = Validation::createValidator();
    }

    /**
     * @param array $data
     * @return ConstraintViolationListInterface
     */
    public function validate(array $data): ConstraintViolationListInterface
    {
        return $this->validations = $this->validator->validate($data, new Collection($this->rules));
    }

    /**
     * @return array
     */
    public function gerErrors()
    {
        $vl = [];

        if ($this->validations) {
            foreach ($this->validations as $violation) {
                $vl[] = [
                    trim($violation->getPropertyPath(), '[]') => $violation->getMessage()
                ];
            }
        }

        return $vl;
    }
}