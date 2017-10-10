<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Csvs;
use AppBundle\Form\FilesType;
use AppBundle\Service\Csv;

class BrowseController extends Controller
{

    public function indexAction(Request $request,Csv $csv )
    {
        $csvs = new Csvs();
        $form = $this->createForm(FilesType::class, $csvs);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $csvs->getFilename();

            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            
            $csv->import_data($file->openFile());
            
            $file->move(
                $this->getParameter('files_directory'),
                $fileName
            );
            

            $csvs->setFilename($fileName);



            return $this->redirect($this->generateUrl('customers'));
        }

        return $this->render('default/import.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
