<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function verifyUser($username, $password)
    {
        $result = $this->findOneBy([
            "username" => $username,
            "password" => md5($password)
        ]);

        if($result != null){
            return true;
        }
        return false;
    }
}