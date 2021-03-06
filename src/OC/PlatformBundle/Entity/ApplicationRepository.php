<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ApplicationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ApplicationRepository extends EntityRepository
{

    public function getApplicationsWithAdvert($limit){

        $qb = $this
            ->createQueryBuilder('a')
            // On fait une jointure avec l'entité Advert avec pour alias « adv »
            ->innerJoin('a.advert', 'adv')
            ->addSelect('adv')
        ;

        // Puis on ne retourne que $limit résultats
        $qb->setMaxResults($limit);

        return $qb
            ->getQuery()
            ->getResult()
        ;
    }
    
}
