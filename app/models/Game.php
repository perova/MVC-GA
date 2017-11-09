<?php

class Game {

    private $db;

    function __construct(Database $db){
        $this->db = $db;
    }

    public function getAllGames(): array
    {
         return $this->db->select("SELECT * FROM play");
    }

    public function getUserGames(string $username): array
    {
        return $this->db->select("SELECT * FROM play WHERE username = :username",
            ["username" => $username]);
    }

    public function getTopWinners(int $count): array
    {
        return $this->db->select("SELECT username, max(result) as max FROM play GROUP BY username ORDER BY max DESC LIMIT :limit",
            ['limit' => $count]);
    }

    public function getTopPlayers(int $count): array
    {
        return $this->db->select("SELECT username, count(*) as play FROM play GROUP BY username ORDER BY play DESC LIMIT :limit",
        ['limit' => $count]);
    }
}