<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Customers;
use League\Csv\Writer;



class EksportController extends Controller
{

    public function indexAction()
    {
//        $csv->import_data();
       
        
        $filename = "CV_FILE_".date("Ymd_i_s").".csv";
        header('Content-type:text/csv');
        header('Content-Disposition: attachment;filename='.$filename);
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0');
        header('Pragma: no-cache');
        header('Expires:0');
        
        $handle = fopen('php://output', 'w');
        
        fputcsv($handle, array(
            'CustomerName',
            'CustomerAdress',
            'CustomerPESEL',
            'Telephonenumber',
            'ContractValue',
            'ContractItem',
//            'ConStartDate',
//            'ConEndDate',
            'ConTypeName'
        ));
        $customers=$this->getDoctrine()->getRepository(Customers::class)->findFetch();
        
        foreach ($customers as $row){
            if($row instanceof \DateTime){
                fputcsv($handle, $row->format('Y-m-d'));
            }
            else {
                fputcsv($handle, $row);
            }
                 
            
        }
        fclose($handle);
        exit;
        
        
//        echo '<pre>';
//        print_r($customers);
//        die;
        
     
//        echo '</pre>';
//        var_dump($customers);
//        die;
//        
//        $csv = Writer::createFromFileObject(new \SplTempFileObject());
//        
//        $csv->insertOne(['CustomerName','CustomerAdress','CustomerPESEL','Telephonenumber','ContractValue','ContractItem','ConStartDate','ConEndDate','ConTypeName']);
//        $csv->insertAll($customers);
//        
//        $csv->output('users.csv');
//        die;
        
        
        return;
    }
}
