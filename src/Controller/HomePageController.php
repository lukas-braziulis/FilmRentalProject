<?php

namespace FilmRental\Controller;

use FilmRental\Service\HomePageService;

class HomePageController
{

    public function __construct(private HomePageService $homePageService)
    {
    }

    public function display()
    {
        $allActorData = $this->homePageService->getAllActors();

        $smarty = new \Smarty();
        $smarty->assign(['allActorData' => $allActorData]);
        $smarty->display(__DIR__ . '/../View/home_page.tpl');
    }
}