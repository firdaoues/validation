<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;




class ReservationController extends AbstractController
{
  

     
   
     /**
     * @Route("/home", name="home")
     */
    public function addpax(Request $request) {

           
             
        if ($request->isMethod('POST')) { 
           //dump($request->request->All()); die ;
           
           $request->request->GET('chambre');
           $request->request->GET('age');
          

        }
       
    
          
            
                  
            
        
                return $this->render('reservation/index.html.twig');
              
                
    }
           
           
   
}
