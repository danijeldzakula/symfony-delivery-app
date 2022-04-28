<?php

namespace App\Controller;

use App\Repository\DelivererRepository;
use App\Repository\RentRepository;
use App\Repository\VehicleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/rent', name: 'rents-')]
class RentController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function rent(RentRepository $rr, DelivererRepository $dr): Response
    {
        $rents = $rr->findAll();
        $drivers = $dr->findLatestRent(2);

        return $this->render('rent/index.html.twig', [
            'rents'=>$rents,
            'drivers'=>$drivers,
        ]);
    }


    #[Route('/vehicle/{id}', name: 'vehicle')]
    public function vehicle_rents($id, VehicleRepository $vr) 
    {
        $vehicle = $vr->find($id);
        $vehicle_rents = $vehicle->getRents();

        return $this->render('rent/rents.html.twig', [
            'vehicle_rents'=>$vehicle_rents,
        ]);
    } 
}

