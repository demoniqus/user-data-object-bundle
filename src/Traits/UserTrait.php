<?php
declare(strict_types=1);

namespace Demoniqus\UserDataObjectBundle\Traits;


use Demoniqus\DataObjectBundle\Common\Traits\EmailTrait;
use Demoniqus\DataObjectBundle\Common\Traits\NameTrait;
use Demoniqus\DataObjectBundle\Common\Traits\Preserve\EmailTrait as PreserveEmailTrait;
use Demoniqus\DataObjectBundle\Common\Traits\Preserve\NameTrait as PreserveNameTrait;

/**
 * @property string|null $username
 * @property string|null $surname
 * @property string|null $patronymic
 */
trait UserTrait
{
    use NameTrait, PreserveNameTrait;
    use EmailTrait, PreserveEmailTrait;

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }

    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function setPatronymic(?string $patronymic): static
    {
        $this->patronymic = $patronymic;

        return $this;
    }
}
