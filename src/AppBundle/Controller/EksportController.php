<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Customers;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class EksportController extends Controller
{

    public function indexAction(Request $request)
    {
//        $csv->import_data();

        $filename = "CV_FILE_".date("Ymd_i_s").".csv";
        header('Content-type:text/csv');
        header('Content-Disposition:attachment;filename='.$filename);
        header('Cache-Control:no-store, no-cache, must-revalidate');
        header('Cache-Control:post-check=0, pre-check=0');
        header('Pragma:no-cache');
        header('Expires:0');
        
        $handle = fopen('php://output', 'w');
        
        fputcsv($handle, array(
            'CustomerName',
            'CustomerAdress',
            'CustomerPESEL',
            'Telephonenumber',
            'ContractValue',
            'ContractItem',
            'ConStartDate',
            'ConEndDate',
            'ConTypeName'
        ));
        $customers=$this->getDoctrine()->getRepository(Customers::class)->findFetch();
             
        foreach ($customers as $row){

                $row['constartdate']= $row['constartdate']->format('Y-m-d');
                $row['conenddate'] = $row['conenddate']->format('Y-m-d');
                fputcsv($handle, $row);
                
        }
        fclose($handle);
        exit;
           
        return;
    }
}
