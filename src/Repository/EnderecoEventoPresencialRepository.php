<?php

namespace App\Repository;

use App\Entity\Evento\EnderecoEventoPresencial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EnderecoEventoPresencial>
 *
 * @method EnderecoEventoPresencial|null find($id, $lockMode = null, $lockVersion = null)
 * @method EnderecoEventoPresencial|null findOneBy(array $criteria, array $orderBy = null)
 * @method EnderecoEventoPresencial[]    findAll()
 * @method EnderecoEventoPresencial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnderecoEventoPresencialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EnderecoEventoPresencial::class);
    }

    public function save(EnderecoEventoPresencial $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EnderecoEventoPresencial $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return EnderecoEventoPresencial[] Returns an array of EnderecoEventoPresencial objects
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

//    public function findOneBySomeField($value): ?EnderecoEventoPresencial
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
