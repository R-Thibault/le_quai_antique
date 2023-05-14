<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Dishes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\QueryBuilder as ORMQueryBuilder;

/**
 * @extends ServiceEntityRepository<Dishes>
 *
 * @method Dishes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dishes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dishes[]    findAll()
 * @method Dishes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DishesRepository extends ServiceEntityRepository


{
    private PaginatorInterface $paginator;
public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
        parent::__construct($registry, Dishes::class);
        $this->paginator = $paginator;
    }

    public function save(Dishes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Dishes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Dishes[] Returns an array of Dishes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Dishes
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    /**
     * recupere les plats en lien avec la recherche
     * @return PaginationInterface
     */
   

     public function findSearch(SearchData $search): PaginationInterface
     {

        $query = $this->getSearchQuery($search)->getQuery();
          
           
        
        
        return $this->paginator->paginate(
            $query,
            $search->page,
            8
        );
     }

        /**
        * recupere le prix min et max d'une recherche
        * @return array
        */
     public function findMinMax(SearchData $search): array
     {
        $results = $this->getSearchQuery($search, true)
            ->select('MIN(dishes.price) as min', 'MAX(dishes.price) as max')
            ->getQuery()
            ->getScalarResult();

         return [$results[0]['min'], $results[0]['max']];
     }

     private function getSearchQuery(SearchData $search, $ignorePrice = false): ORMQueryBuilder
     {
        $query = $this
            ->createQueryBuilder('dishes')
            ->select('dishes', 'cat')
            ->join('dishes.category', 'cat');

        if (!empty($search->searchText)) {
            $query = $query
                ->andWhere('dishes.title LIKE :searchText')
                ->setParameter('searchText', "%{$search->searchText}%");
    
        }
    
        if (!empty($search->min) && $ignorePrice === false) {
            $query = $query
                ->andWhere('dishes.price >= :min')
                ->setParameter('min', $search->min);
        }
    
        if (!empty($search->max) && $ignorePrice === false) {
            $query = $query
                ->andWhere('dishes.price <= :max')
                ->setParameter('max', $search->max);
        }
    
        if (!empty($search->categories)) {
            $query = $query
                ->andWhere('cat.id IN (:categories)')
                ->setParameter('categories', $search->categories);
        }

        return $query;
     }
     
}



