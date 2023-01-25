<?php

namespace FilmRental\Controller;

use FilmRental\Service\ActorDetailsService;

class ActorDetailsController
{

    public function __construct(private ActorDetailsService $actorDetailsService)
    {
    }

    public function displayActorDetails(array $request)
    {
        $allActorDetails = $this->actorDetailsService->getAllActorDetails($request);
        $actor = $this->actorDetailsService->getActorById($request);

        $smarty = new \Smarty();
        $smarty->assign(['allActorDetails' => $allActorDetails, 'actor' => $actor[0]]);
        $smarty->display(__DIR__ . '/../View/actor_details_page.tpl');
    }
}