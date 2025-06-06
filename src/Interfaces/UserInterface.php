<?php
declare(strict_types=1);

namespace Demoniqus\UserDataObjectBundle\Interfaces;

use Demoniqus\DataObjectBundle\Common\Interfaces\EmailInterface;
use Demoniqus\DataObjectBundle\Common\Interfaces\NameInterface;
use Demoniqus\DataObjectBundle\Common\Interfaces\Preserve\EmailInterface as PreserveEmailInterface;
use Demoniqus\DataObjectBundle\Common\Interfaces\Preserve\NameInterface as PreserveNameInterface;

interface UserInterface extends NameInterface, PreserveNameInterface, EmailInterface, PreserveEmailInterface
{
    public function getUsername(): ?string;

    /**
     * @return static
     */
    public function setUsername(?string $username);

    public function getSurname(): ?string;

    /**
     * @return static
     */
    public function setSurname(?string $surname);

    public function getPatronymic(): ?string;

    /**
     * @return static
     */
    public function setPatronymic(?string $patronymic);
}
