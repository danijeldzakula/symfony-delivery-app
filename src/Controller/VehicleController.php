<?php

    namespace App\Controller;

    use App\Entity\Vehicle;
    use App\Repository\VehicleRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;


    #[Route('/vehicle', name: 'vehicle-')]
    class VehicleController extends AbstractController
    {
        #[Route('/', name: 'home', methods: ['GET', 'POST'])]
        public function vehicle(Request $request, VehicleRepository $vr): Response
        {
            $vehicle = new Vehicle();
            /* get value from form */
            $submit = $request->request->get('action');
            $name = $request->request->get('name');
    
            /* add new deliverer */
            if (!empty($name) && $request->getMethod() === 'POST') {
                $result = $vehicle->setVehicle($name);
                $vr->add($result);
                unset($name);

                return $this->redirectToRoute('vehicle-home', [], Response::HTTP_SEE_OTHER);
            }
    
            /* render vehicles */
            return $this->render('vehicle/index.html.twig', [
                'vehicles'=> $vr->findBy([], ['id' => 'ASC']),
            ]);
    
            /* redirect ro route */
            if (!isset($submit)) {
                return $this->redirectToRoute('vehicle-home', [], Response::HTTP_SEE_OTHER);
            }   

            return $this->render('vehicle/index.html.twig', []);
        }
    }
