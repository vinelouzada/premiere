<?php

namespace App\Repository;

use App\Entity\EventoPresencial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EventoPresencial>
 *
 * @method EventoPresencial|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventoPresencial|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventoPresencial[]    findAll()
 * @method EventoPresencial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

#https://www.sympla.com.br/validar?token=442714b33941cef7a619332c907eed09&email=cejor42012%40syinxun.com&t=1
class EventoPresencialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventoPresencial::class);
    }

    public function save(EventoPresencial $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EventoPresencial $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return EventoPresencial[] Returns an array of EventoPresencial objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EventoPresencial
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
