<?php

namespace DI;

class UserRepository
{

    private Db $db;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    /**
     * @param Db $db
     */
    public function setDb(Db $db): self
    {
        $this->db = $db;
        return $this;
    }

    public function findByEmail(string $email): ?User
    {
        $res = $this->db->query(
            'SELECT * FROM users WHERE email=:email',
            [':email' => $email],
            User::class
        );

        return !empty($res) ? $res[0] : null;
    }
}