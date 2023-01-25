<?php

namespace FilmRental\Framework;

use FilmRental\Controller\ActorDetailsController;
use FilmRental\Controller\SearchPageController;
use FilmRental\Controller\FilmDetailsController;
use FilmRental\Controller\HomePageController;
use FilmRental\Controller\PageNotFoundController;

class Router
{
    public function __construct(
        private PageNotFoundController $pageNotFoundController,
        private HomePageController     $homePageController,
        private SearchPageController   $searchPageController,
        private FilmDetailsController  $filmDetailsController,
        private ActorDetailsController $actorDetailsController
    )
    {
    }

    public function process(string $route, array $request = null)
    {
        switch ($route) {
            case '/':
                $this->homePageController->display();
                break;
            case '/search':
                $this->searchPageController->display($request);
                break;
            case '/actor-details':
                $this->actorDetailsController->displayActorDetails($request);
                break;
            case '/film-details':
                $this->filmDetailsController->display($request);
                break;
            default:
                $this->pageNotFoundController->display();
                break;
        }
    }
}