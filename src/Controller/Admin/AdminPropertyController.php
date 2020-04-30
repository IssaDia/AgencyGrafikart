<?php

namespace App\Controller\Admin;

use App\Entity\Property;
use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AdminPropertyController extends AbstractController
{
    /**
     * @Route("/admin", name="admin.property.index")
     */
    public function index(PropertyRepository $repository)
    {

        $properties = $repository->findAll();

        return $this->render('admin/property/index.html.twig', [
            'properties' => $properties
        ]);
    }

    /**
     * @Route("/admin/property/create", name="admin.property.new")
     */
    public function new(Request $request, EntityManagerInterface $manager)
    {

        $property = new Property();
        $form = $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($property);
            $manager->flush();
            $this->addFlash('success', 'Bien ajouté avec succés');
            return $this->redirectToRoute('admin.property.index');
        }

        return $this->render('admin/property/new.html.twig', [
            'property' => $property,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/property/{id}", name="admin.property.edit", methods="GET|POST")
     */
    public function edit(Property $property, Request $request, EntityManagerInterface $manager)
    {

        $form = $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->flush();
            $this->addFlash('success', 'Bien modifié avec succés');
            return $this->redirectToRoute('admin.property.index');
        }


        return $this->render('admin/property/edit.html.twig', [
            'property' => $property,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/property/{id}", name="admin.property.delete", methods="DELETE")
     */
    public function delete(Property $property, EntityManagerInterface $manager, Request $request)
    {
        if ($this->isCsrfTokenValid('delete', $property->getId(), $request->get('_token'))) {
            $manager->remove($property);
            $manager->flush();
            $this->addFlash('success', 'Bien supprimé avec succés');

        }


        return $this->redirectToRoute('admin.property.index');
    }
}
