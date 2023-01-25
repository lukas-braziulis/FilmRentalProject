<?php

namespace FilmRental\Controller;

use FilmRental\Repository\SearchPageRepository;
use FilmRental\Service\SearchPageService;

class SearchPageController
{

    public function __construct(private SearchPageService $searchPageService)
    {
    }

    public function display($request)
    {

        $actorData = $this->searchPageService->getActorBySearch($request);

        $smarty = new \Smarty();
        $smarty->assign(['allActorData' => $actorData]);
        $smarty->display(__DIR__ . '/../View/home_page.tpl');
    }
}