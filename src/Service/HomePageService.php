<?php

namespace FilmRental\Service;

use FilmRental\Repository\HomePageRepository;

class HomePageService
{

    public function __construct(private HomePageRepository $homePageRepository)
    {
    }

    public function getAllActors(): array
    {
        return $this->homePageRepository->getAllActors();

    }
}