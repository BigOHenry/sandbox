<?php

namespace App\Presenters;
use Nette;
use Ublaboo\ApiRouter\ApiRoute;

/**
 * API for managing users
 *
 * @ApiRoute(
 * 	"/api-router/api/users[/<id>]",
 * 	parameters={
 * 		"id"={
 * 			"requirement": "\d+",
 * 			"default": 10
 * 		}
 * 	},
 *  priority=1,
 *  presenter="Resources:Users"
 * )
 */
class UsersPresenter extends Nette\Application\UI\Presenter
{

    /**
     * Get user detail
     *
     * @ApiRoute(
     * 	"/api-router/api/users/<id>[/<foo>-<bar>]",
     * 	parameters={
     * 		"id"={
     * 			"requirement": "\d+"
     * 		}
     * 	},
     * 	method="GET",
     * 	)
     */
    public function actionRead($id, $foo = NULL, $bar = NULL)
    {
        $this->sendJson(['id' => $id, 'foo' => $foo, 'bar' => $bar]);
    }


    public function actionUpdate($id)
    {
        $this->sendJson(['id' => $id]);
    }


    public function actionDelete($id)
    {
        $this->sendJson(['id' => $id]);
    }

}