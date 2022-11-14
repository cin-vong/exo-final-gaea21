<?php

namespace App\Controller;

use App\Repository\PossesionRepository;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/users' , name: 'users', methods:["GET"])]
    public function getUsers(UsersRepository $userRepository):Response
    {

        $users = $userRepository->findAll();
        // var_dump($users);
        $encoder= new JsonEncoder();
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object->getId();
            },
        ];

        $normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);
        $serializer = new Serializer([$normalizer], [$encoder]);
        $json = $serializer->serialize($users, 'json', ['group' => 'user:read']);
        // var_dump($json);

        $response = new Response($json, 200, [
            "Content-Type" => "application/json"
        ]);
        return $response;
    }

    #[Route('/usersdelete/{id}' , name: 'delete', methods:["GET"])]
    public function deleteUser(UsersRepository $userRepository, $id):Response
    {

        $userRepository->remove($userRepository->find($id), true);
        // var_dump($users);
        $encoder= new JsonEncoder();
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object->getId();
            },
        ];

        $normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);
        $serializer = new Serializer([$normalizer], [$encoder]);
        $jsonnew =  $userRepository->findAll();
        $json = $serializer->serialize($jsonnew, 'json', ['group' => 'user:read']);
        // var_dump($json);

        $response = new Response($json, 200, [
            "Content-Type" => "application/json"
        ]);
        return $response;
    }

    #[Route('/userspossesion/{id}' , name: 'possesion')]
    public function PossesionUser(PossesionRepository $possesionRepository, $id):Response
    {

        $possesions = $possesionRepository->find($id) ;
        // dd($possesions);
        $encoder= new JsonEncoder();
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object->getId();
            },
        ];

        $normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);
        $serializer = new Serializer([$normalizer], [$encoder]);
        // $userposs =  $possesionRepository->findOneBy(['id' => $id ]);
        $json = $serializer->serialize($possesions, 'json', ['group' => 'user:read']);
        // var_dump($json);

        $response = new Response($json, 200, [
            "Content-Type" => "application/json"
        ]);
        return $response;
    }
    
    
}
