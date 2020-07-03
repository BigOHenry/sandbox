<?php declare(strict_types=1);

namespace App\Components\UserDatagrid;

/**
 * Interface IUserDatagridFactory
 * @package App\Components\UserDatagrid
 */
interface IUserDatagridFactory
{

    /**
     * @return UserDatagridControl
     */
    public function create(): UserDatagridControl;
}