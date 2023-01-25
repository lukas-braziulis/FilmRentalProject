<?php

namespace FilmRental\Service;

use FilmRental\Repository\SearchPageRepository;

class SearchPageService
{
    public function __construct(private SearchPageRepository $searchPageRepository)
    {
    }

    public function getActorBySearch($request)
    {
        $request= trim($request['search-input']);
        $searchInput = explode(' ', $request);

        return $this->searchPageRepository->getActor($searchInput);
    }
}