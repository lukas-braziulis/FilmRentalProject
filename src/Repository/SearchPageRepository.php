<?php

namespace FilmRental\Repository;

use FilmRental\Framework\DbConnection;

class SearchPageRepository
{
    private function db()
    {
        $instance = DbConnection::getInstance();

        return $instance->getConnection();
    }

    public function getActor(array $searchInput): array
    {
        $conn = $this->db();

        $query = "SELECT * FROM actor WHERE first_name = :searchName";
        $queryValues = ['searchName' => $searchInput[0]];

        if (isset($searchInput[1]) and !empty($searchInput[1])) {
            $query .= " AND last_name = :searchSurname";
            $queryValues['searchSurname'] = $searchInput[1];
        };

        $statement = $conn->prepare($query);
        $statement->execute($queryValues);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
