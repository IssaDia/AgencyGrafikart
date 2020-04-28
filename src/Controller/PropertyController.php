<?php

namespace App\Controller;

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
    public function index()
    {

        return $this->render('property/index.html.twig', [
            'current_menu' => 'properties'
        ]);
    }

    /**
     * @Route("/biens/{slug}-{id}", name="property.show", requirements={"slug":"[a-z0-9\-]*"})
     */
    public function show(PropertyRepository $repository, $slug,$id)
    {
        $property = $repository->find($id);

        if ($property->getSlug() !== $slug){
            return $this->redirectToRoute('property.show', [
                'id'=>$property->getId(),
                'slug'=>$property->getSlug()
            ],301);
        }

        return $this->render('property/show.html.twig', [
            'property'=> $property,
            'current_menu' => 'properties'
        ]);
    }
}
