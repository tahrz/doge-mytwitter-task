<?php

namespace App\Actions\User;

use Framework\Action;
use App\Helpers\Traits;
use App\Services\ImgUploader;
use App\Repository\UserRepository;

/**
 * Class SettingsAction
 *
 * @package App\Actions\User
 */
class SettingsAction extends Action
{
    public function __invoke()
    {
        if ($this->request->files->get('avatar')) {
            $avatar = ImgUploader::upload($this->request->files->get('avatar'));
            $this->request->request->add(['avatar' => $avatar]);
        }

        UserRepository::UpdateUser($this->session->get('login'), $this->request->request->all());
        Traits::redirect('/profile/' . $this->session->get('login'));
    }
}