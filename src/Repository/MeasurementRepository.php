<?php

//namespace App\Repository;
//
//use App\Entity\Location;
//use App\Entity\Measurement;
//use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
//use Doctrine\Persistence\ManagerRegistry;
//
///**
// * @extends ServiceEntityRepository<Measurement>
// */
//class MeasurementRepository extends ServiceEntityRepository
//{
//    public function __construct(ManagerRegistry $registry)
//    {
//        parent::__construct($registry, Measurement::class);
//    }
//
//    //    /**
//    //     * @return Measurement[] Returns an array of Measurement objects
//    //     */
//    //    public function findByExampleField($value): array
//    //    {
//    //        return $this->createQueryBuilder('m')
//    //            ->andWhere('m.exampleField = :val')
//    //            ->setParameter('val', $value)
//    //            ->orderBy('m.id', 'ASC')
//    //            ->setMaxResults(10)
//    //            ->getQuery()
//    //            ->getResult()
//    //        ;
//    //    }
//
//    //    public function findOneBySomeField($value): ?Measurement
//    //    {
//    //        return $this->createQueryBuilder('m')
//    //            ->andWhere('m.exampleField = :val')
//    //            ->setParameter('val', $value)
//    //            ->getQuery()
//    //            ->getOneOrNullResult()
//    //        ;
//    //    }

namespace App\Repository;

    use App\Entity\Location;
    use App\Entity\Measurement;
    use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
    use Doctrine\Persistence\ManagerRegistry;

class MeasurementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Measurement::class);
    }

    /**
     * @return Measurement[]
     */
    public function findByLocation(Location $location): array
    {
        return $this->createQueryBuilder('m')
            ->join('m.station', 's')
            ->andWhere('s.location = :loc')
            ->setParameter('loc', $location)
            ->orderBy('m.date', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
