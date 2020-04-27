<?php namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PropertyController extends AbstractController
{
    /**
     * @Route("/biens", name="property.index")
     */
    public function index( PropertyRepository $repository)
    {
        
        $property = $repository->findAllVisible();

       
        return $this->render('pages/property.html.twig', [
            'current_menu' => 'properties'
        ]);
    }

    /**
     * @Route("/biens/{slug}-id", name="property.index", requirements)
     */
    public function show( PropertyRepository $repository)
    {
        
        $property = $repository->findAllVisible();

       
        return $this->render('pages/property.html.twig', [
            'current_menu' => 'properties'
        ]);
    }
}
}