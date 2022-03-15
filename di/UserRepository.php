<?php

namespace DI;

class UserRepository
{
    private Db $db;

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
        $db = new Db();
        $res = $db->query(
            'SELECT * FROM users WHERE email=:email',
            [':email' => $email],
            User::class
        );

        return !empty($res) ? $res[0] : null;
    }
}