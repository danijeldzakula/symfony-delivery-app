<?php

namespace App\Controller;

use App\Entity\Deliverer;
use App\Entity\Rent;
use App\Repository\DelivererRepository;
use App\Repository\RentRepository;
use App\Repository\VehicleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/deliverer', name: 'deliverer-')]
class DelivererController extends AbstractController
{
    #[Route('/', name: 'home', methods: ['GET', 'POST'])]
    public function deliverer(Request $request, DelivererRepository $dr, VehicleRepository $vr, RentRepository $rr): Response
    {
        $deliverer = new Deliverer();
        /* get value from form */
        $submit = $request->request->get('action');
        $name = $request->request->get('name');

        /* select option */
        $select = $request->request->get('select');
        /* deliverer id */
        $delivererId = $request->request->get('deliverer');

        /* get deliverer vehicle */
        $vehicle_options = $vr->findAll();

        if (!empty($select) && !empty($delivererId) && $request->getMethod() === 'POST') {
            $deliverer = $dr->find($delivererId);
            $vehicle = $vr->find($select);
    
            $rent = new Rent();
            $rent->setDeliverer($deliverer);
            $rent->setVehicle($vehicle);
    
            $rr->add($rent);            

            return $this->redirectToRoute('deliverer-home', [], Response::HTTP_SEE_OTHER);
        }

        /* add new deliverer */
        if (!empty($name) && $request->getMethod() === 'POST') {
            $result = $deliverer->setName($name);
            $dr->add($result);
            unset($name);
            return $this->redirectToRoute('deliverer-home', [], Response::HTTP_SEE_OTHER);
        }

        /* render deliverers */
        return $this->render('deliverer/index.html.twig', [
            'deliverers'=>$dr->findBy([], ['id' => 'ASC']),
            'vehicle_options'=>$vehicle_options,
        ]);

        /* redirect ro route */
        if (!isset($submit)) {
            return $this->redirectToRoute('deliverer-home', [], Response::HTTP_SEE_OTHER);
        }   
    }

    #[Route('/history/{id}', name: 'history')]
    public function history($id, DelivererRepository $dr)
    {

        $deliverer = $dr->find($id);
        $deliverer_rents = $deliverer->getRents();

        return $this->render('deliverer/history.html.twig', [
            'deliverer_rents'=>$deliverer_rents,
        ]);
    }
}


