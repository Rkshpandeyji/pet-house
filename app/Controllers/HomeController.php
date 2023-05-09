<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\State;
use App\Models\City;
use LDAP\Result;

class HomeController extends Controller
{
    public function index()
    {
        $session = session();
        echo view('deshboard');
    }


    public function state()
    {
        $res= array();
        // echo view('state/state');
        $state = new State();
        $city = new City();
        $state1 =  $state->get()->getResult();
        $result = $city->get()->getResult();
        $data['data1'] = $state->get()->getResult();
        $data['products'] =  $state->select('*')->join('cities','states.id = cities.id')->get()->getResult();

        $data['res']= array('city'=>$result,'state'=>$state1);
        // echo "<pre>";
        // print_r($res);
        // echo "</pre>";

        // die;

		return view('state/state', $data);
    //  print_r($result);die;
       
        // foreach($state1 as $i=>$product)
        // {
        //     // print_r($product->id);die;
        //     $result = $city->where('state_id', $product->id)->get()->getResult();
        //     foreach($result as $i=>$product1)
        //     {
        //         // $data = compact('product','product1');
        //         // print_r($data);die;
        //     }
        // }
        // $data = compact('state1','product1');
        // // $city1 =  $city->select('*')->findAll();
        // // $this->load->view('state/state', $data);
        // return view('state/state', $data);
    }
    public function addstate()
    {
        helper(['form']);
        echo view('state/add-state');
    }
    public function storestate()
    {
        helper(['form']);
        $state = new State();
        $city = new City();
        // dd($this->request);
        $from_state = $this->request->getVar('state');
        $from_city = $this->request->getVar('city');
        $imageFile = $this->request->getFile('file');

        $data1 = [
            'name' => $from_state,
        ];
        // $where_clause = "`name` = {$from_state}";
        $result = $state->like('name', $from_state)->get()->getResult();
        $result1 = $city->like('name', $from_city)->get()->getResult();
        // print_r($result[0]->id);die;
        if ($result == NULL) {
            $state->insert($data1);
            $state_id = $state->getInsertID();
        } else
        {
        $state_id = $result[0]->id;
    }
    if ($imageFile &&    $result1 == NULL) {
            // echo $state_id;die;
            // echo "11";
            $imageFile = $this->request->getFile('file');
            $imageFile->move('city/' . 'uploads');
            $data = [
                "state_id" => $state_id,
                'name' => $from_city,
                'image' => $imageFile->getClientName(),
            ];


            $city->insert($data);
            $city_id = $state->getInsertID();
            echo "<script>alert('Added.');</script>";
            return $this->response->redirect(site_url('/state'));
        }else{
            echo "<script>alert('city already exit.');</script>";
            return $this->response->redirect(site_url('/add-state'));
        }

        // echo "12";
    }
}
