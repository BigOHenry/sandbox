<?php declare(strict_types=1);

namespace App\Presenters;

use App\Components\UserDatagrid\IUserDatagridFactory;
use App\Components\UserDatagrid\UserDatagridControl;

/**
 * Class HomepagePresenter
 * @package App\Presenters
 */
final class HomepagePresenter extends BasePresenter
{

    /**
     * @var IUserDatagridFactory
     * @inject
     */
    public $userDatagrid;

    /**
     * @return UserDatagridControl
     */
    public function createComponentUserDatagrid(): UserDatagridControl
    {
        return $this->userDatagrid->create();
    }
}
