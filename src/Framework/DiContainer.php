<?php

namespace FilmRental\Framework;

use FilmRental\Controller\ActorDetailsController;
use FilmRental\Controller\SearchPageController;
use FilmRental\Controller\FilmDetailsController;
use FilmRental\Controller\HomePageController;
use FilmRental\Controller\PageNotFoundController;
use FilmRental\Repository\ActorDetailsRepository;
use FilmRental\Repository\FilmDetailsRepository;
use FilmRental\Repository\SearchPageRepository;
use FilmRental\Repository\HomePageRepository;
use FilmRental\Service\ActorDetailsService;
use FilmRental\Service\FilmDetailsService;
use FilmRental\Service\SearchPageService;
use FilmRental\Service\HomePageService;
use RuntimeException;

class DiContainer
{
    private array $entries = [];

    public function get(string $id)
    {
        if (!$this->has($id)) {
            throw new RuntimeException('Class ' . $id . 'not found in container.');
        }
        $entry = $this->entries[$id];

        return $entry($this);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable $callable): void
    {
        $this->entries[$id] = $callable;
    }

    public function loadDependencies()
    {
        $this->set(
            Router::class,
            function (DiContainer $container) {
                return new Router(
                    $container->get(PageNotFoundController::class),
                    $container->get(HomePageController::class),
                    $container->get(SearchPageController::class),
                    $container->get(FilmDetailsController::class),
                    $container->get(ActorDetailsController::class),
                );
            }
        );

        $this->set(
            SearchPageRepository::class,
            function (DiContainer $container){
                return new SearchPageRepository();
            }
        );

        $this->set(
            HomePageRepository::class,
            function (DiContainer $container){
                return new HomePageRepository();
            }
        );

        $this->set(
            ActorDetailsRepository::class,
            function (DiContainer $container){
                return new ActorDetailsRepository();
            }
        );

        $this->set(
            FilmDetailsRepository::class,
            function (DiContainer $container){
                return new FilmDetailsRepository();
            }
        );

        $this->set(
            PageNotFoundController::class,
            function (DiContainer $container){
                return new PageNotFoundController();
            }
        );

        $this->set(
            HomePageController::class,
            function (DiContainer $container){
                return new HomePageController(
                    $container->get(HomePageService::class)
                );
            }
        );

        $this->set(
            SearchPageController::class,
            function (DiContainer $container){
                return new SearchPageController(
                    $container->get(SearchPageService::class)
                );
            }
        );

        $this->set(
            ActorDetailsController::class,
            function (DiContainer $container){
                return new ActorDetailsController(
                    $container->get(ActorDetailsService::class)
                );
            }
        );

        $this->set(
            FilmDetailsController::class,
            function (DiContainer $container){
                return new FilmDetailsController(
                    $container->get(FilmDetailsService::class)
                );
            }
        );

        $this->set(
            SearchPageService::class,
            function (DiContainer $container){
                return new SearchPageService(
                    $container->get(SearchPageRepository::class)
                );
            }
        );

        $this->set(
            HomePageService::class,
            function (DiContainer $container){
                return new HomePageService(
                    $container->get(HomePageRepository::class)
                );
            }
        );

        $this->set(
            ActorDetailsService::class,
            function (DiContainer $container){
                return new ActorDetailsService(
                    $container->get(ActorDetailsRepository::class)
                );
            }
        );

        $this->set(
            FilmDetailsService::class,
            function (DiContainer $container){
                return new FilmDetailsService(
                    $container->get(FilmDetailsRepository::class)
                );
            }
        );


    }
}