<?php declare(strict_types=1);

namespace App\Presenters;

use Nette\Application\UI\Presenter;


/**
 * Class BasePresenter
 * @package App\Presenters
 */
abstract class BasePresenter extends Presenter
{

    /**
     * @return MenuControl
     */
    protected function createComponentMenu(): MenuControl
    {
        return $this->menuFactory->create();
    }

}//class
