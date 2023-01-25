<?php

namespace FilmRental\Service;

use FilmRental\Repository\ActorDetailsRepository;

class ActorDetailsService
{

    public function __construct(private ActorDetailsRepository $actorDetailsRepository)
    {
    }

    public function getAllActorDetails(array $request)
    {
        return $this->actorDetailsRepository->getAllActorDetails($request);
    }

    public function getActorById(array $request)
    {
        return $this->actorDetailsRepository->getActorById($request);
    }

}