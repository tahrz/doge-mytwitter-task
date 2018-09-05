<?php

namespace App\Helpers;

/**
 * Class Permission
 * @package App\Helpers
 */
class Permission
{
    /**
     * @param string $userRole
     * @param array $rules
     * @param string $actionName
     * @return bool
     */
    public static function canI(string $userRole, array $rules, string $actionName): bool
    {
        foreach ($rules as $key => $value) {
            if ($key = 'permission') {
                foreach ($value as $k => $vl) {
                    if ($k === $actionName) {
                        foreach ($vl as $v) {
                            if ($userRole === $v) {
                                return true;
                            }
                        }
                    }
                }
            }
        }

        return false;
    }
}