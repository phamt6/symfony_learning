<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeScreenController extends AbstractController
{
    /**
     * @Route("/home", name="home_screen", methods={"DELETE"})
     */
    public function index(Request $request): Response
    {
        return $this->json([
            'message' => $request->query->get('page')
        ]);
    }

    /**
     * @Route("/recipe/{id}", name="get_a_recipe", methods={"GET"})
     */
    public function recipe($id, Request $request)
    {
        return $this->json([
            'message' => 'Requesting recipe with id' . $id,
            'page' => $request->query->get('page')
        ]);
    }

    /**
     * @Route("/recipes/all", name="get_a_recipes", methods={"GET"})
     */
    public function getAllRecipes(){
        $rootPath = $this->getParameter('kernel.project_dir');
        $recipes = file_get_contents($rootPath.'/resources/recipes.json');
        $decodedRecipes = json_decode($recipes, true);
        return $this->json($decodedRecipes);
    }
}
