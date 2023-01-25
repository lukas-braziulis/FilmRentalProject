<?php

namespace FilmRental\Repository;

use FilmRental\Framework\DbConnection;

class FilmDetailsRepository
{
    private function db()
    {
        $instance = DbConnection::getInstance();

        return $instance->getConnection();
    }

    public function getFillDetails(array $request): array
    {
        $conn = $this->db();

        $query = "
        SELECT *
        FROM film
        WHERE id = :filmId;
        ";
        $queryValues = ['filmId' => $request['film_id']];

        $statement = $conn->prepare($query);
        $statement->execute($queryValues);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

}