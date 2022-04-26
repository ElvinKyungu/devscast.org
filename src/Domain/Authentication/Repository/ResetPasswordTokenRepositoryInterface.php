<?php

declare(strict_types=1);

namespace Domain\Authentication\Repository;

use Domain\Authentication\Entity\ResetPasswordToken;
use Domain\Authentication\Entity\User;
use Domain\Shared\Repository\DataRepositoryInterface;

/**
 * Interface ResetPasswordRepositoryInterface.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
interface ResetPasswordTokenRepositoryInterface extends DataRepositoryInterface
{
    public function findFor(User $user): ?ResetPasswordToken;

    public function findOneByToken(string $token): ?ResetPasswordToken;
}
