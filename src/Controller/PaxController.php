<?php

namespace App\Controller;

use App\Entity\Group;
use App\Entity\Pax;
use App\Form\GroupType;
use App\Form\PaxType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;




class PaxController extends AbstractController
{
  
      /**
     * @Route("/validation", name="validation")
     */
    public function Valdation(Request $request) {

         $agePax = [18,25,2,18,36,12,44,5];
         $tranche1 = [0,15];
         $tranche2 = [16,99];
         $nbrPersonneParChambre = 3;
         $nbrEnfants = 0;
         $nbrAdulte = 0;
     foreach ($agePax as $age)
        ($age >= $tranche1[0] && $age <= $tranche1[1]) ? $nbrEnfants++ : $nbrAdulte++;
        (fmod(count($agePax),$nbrPersonneParChambre) > 0) ?
            $nbrChambre = intval(count($agePax)/$nbrPersonneParChambre) + 1:
            $nbrChambre = intval(count($agePax)/$nbrPersonneParChambre);
            $resultat = [];
     if ($nbrChambre>$nbrAdulte)
        echo "Impossible";
     else {
     for ($i=0; $i <= $nbrChambre - 1; $i++){
        $resultat[$i] = 'A';
        $nbrAdulte--;
     }
       $j = $nbrChambre;
     while ($nbrEnfants > 0){
        $resultat[$j] = 'E';
        $nbrEnfants--;
        $j++;
    }
     if ($nbrAdulte > 0){
        for ($x=1; $x<=$nbrAdulte; $x++){
            $resultat[$j] = 'A';
        }
    }
}

        return $this->render('pax/index.html.twig');
        $this->addFlash('success','');
        }
}
