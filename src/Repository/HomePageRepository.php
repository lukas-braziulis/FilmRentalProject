<?php

namespace FilmRental\Repository;

use FilmRental\Framework\DbConnection;

class HomePageRepository
{

    private function db()
    {
        $instance = DbConnection::getInstance();
        return $instance->getConnection();
    }

    public function getAllActors(): array
    {
        $conn = $this->db();
        $statement = $conn->prepare('SELECT id, first_name, last_name FROM actor');
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

}