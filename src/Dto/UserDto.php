<?php
declare(strict_types=1);

namespace Demoniqus\UserDataObjectBundle\Dto;

use Demoniqus\DataObjectBundle\Common\Traits\EmailFieldTrait;
use Demoniqus\DataObjectBundle\DataObject\Representative\Dto\DataObjectDto;
use Demoniqus\UserDataObjectBundle\Interfaces\UserDtoInterface;
use Demoniqus\UserDataObjectBundle\Traits\UserTrait;

class UserDto extends DataObjectDto implements UserDtoInterface
{
    use UserTrait;
    use EmailFieldTrait;
    private ?string $username = null;
    private ?string $surname = null;
    private ?string $patronymic = null;

}
