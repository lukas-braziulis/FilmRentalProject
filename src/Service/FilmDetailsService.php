<?php

namespace FilmRental\Service;

use FilmRental\Repository\FilmDetailsRepository;

class FilmDetailsService
{
    public function __construct(private FilmDetailsRepository $filmDetailsRepository)
    {
    }

    public function getFilmDetails($request): array
    {
        return $this->filmDetailsRepository->getFillDetails($request);


    }
}