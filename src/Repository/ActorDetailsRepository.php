<?php

namespace FilmRental\Repository;

use FilmRental\Framework\DbConnection;

class ActorDetailsRepository
{

    private function db()
    {
        $instance = DbConnection::getInstance();

        return $instance->getConnection();
    }

    public function getAllActorDetails(array $request): array
    {
        $conn = $this->db();

        $query = "
        SELECT *
        FROM actor a
        JOIN film_actor fa on a.id = fa.actor_id
        JOIN film f on fa.film_id = f.id
        WHERE a.id = :actorDetailsId;
        ";
        $queryValues = ['actorDetailsId' => $request['actor_details_id']];

        $statement = $conn->prepare($query);
        $statement->execute($queryValues);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getActorById(array $request): array
    {
        $conn = $this->db();
        $statement = $conn->prepare("SELECT first_name, last_name FROM actor WHERE id = :id");
        $statement->execute(['id' => $request['actor_details_id']]);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}