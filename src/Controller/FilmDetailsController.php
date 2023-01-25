<?php

namespace FilmRental\Controller;

use FilmRental\Service\FilmDetailsService;

class FilmDetailsController
{

    public function __construct(private FilmDetailsService $filmDetailsService)
    {
    }

    public function display($request)
    {
        $filmDetails = $this->filmDetailsService->getFilmDetails($request);

        $smarty = new \Smarty();
        $smarty->assign((['filmDetails' => $filmDetails]));
        $smarty->display(__DIR__ . '/../View/film_details_page.tpl');
    }
}