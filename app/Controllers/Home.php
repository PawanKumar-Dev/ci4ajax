<?php
namespace App\Controllers;
use \App\Models\Homemodel;

class Home extends BaseController
{
    public function index()
    {
        return view('home');
    }

    public function fetchall()
    {
        $homemodel = new Homemodel();
        $json = $homemodel->getAllData();

        echo json_encode($json);
    }


    public function insert()
    {
        $request = \Config\Services::request();
        $incomingJson = $request->getVar('jsondata');

        $iData = json_decode($incomingJson, true);
        $insData = [
            'product_name' => $iData['product_name'],
            'product_brand' => $iData['product_brand'],
            'product_price' => $iData['product_price'],
            'product_category' => $iData['product_category'],
            'product_desc' => $iData['product_desc'],
            'product_img' => $iData['product_img'],
        ];

        $homemodel = new Homemodel();
        if ($homemodel->insertData($insData)) {
            $output = json_encode(["data" => "Inserted Successfully", "status" => 200]);
            echo $output;
        } else {
            $output = json_encode(["data" => "Inserted Failed", "status" => 400]);
            echo $output;
        }
    }


    public function delete()
    {
        $request = \Config\Services::request();
        $jsonid = $request->getVar('id');

        $id = json_decode($jsonid, true);

        $homemodel = new Homemodel();
        if ($homemodel->removeData($id['delid'])) {
            $output = json_encode(["data" => "Removal Successfully", "status" => 200]);
            echo $output;
        } else {
            $output = json_encode(["data" => "Removal Failed", "status" => 400]);
            echo $output;
        }
    }


    public function edit()
    {
        $request = \Config\Services::request();
        $editid = $request->getVar('id');
        $id = json_decode($editid, true);

        $homemodel = new Homemodel();
        $outputJson = $homemodel->getSingleData($id['editid']);

        echo json_encode($outputJson);
    }


    public function update()
    {
        $request = \Config\Services::request();
        $incomingUpJson = $request->getVar('jsondata');

        $uData = json_decode($incomingUpJson, true);

        $upData = [
            'product_name' => $uData['product_name'],
            'product_brand' => $uData['product_brand'],
            'product_price' => $uData['product_price'],
            'product_category' => $uData['product_category'],
            'product_desc' => $uData['product_desc'],
            'product_img' => $uData['product_img'],
        ];

        $homemodel = new Homemodel();
        if ($homemodel->updateData($upData, $uData['product_id'])) {
            $output = json_encode(["data" => "Updated Successfully", "status" => 200]);
            echo $output;
        } else {
            $output = json_encode(["data" => "Update Failed", "status" => 400]);
            echo $output;
        }
    }
}