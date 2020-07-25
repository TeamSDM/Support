<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TicketCategoryRequest;
use Ticket;
use Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->TicketCategoryRequest;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('home');
    }
    public function prueba(){


    }
   
    public function countCategoryTicket($from, $to, $category){
        
            $data = Ticket::whereBetween('created_at',[$from, $to])->where('category_id', $category)
            ->get(['category_id'])->groupBy('category_id');
    
            foreach ($data as $key => $value){
                $option = ($key == '') ? '0' : $key;
                $data[] = ['category_id' => $option, 'Total' => count($data[$key])];
                unset($data[$key]);//destruir el dato que se le paso
            }
            $categoryId = [];
            $categoryName = [];
            foreach ($data as $categorys){
                array_push($categoryId);
                array_push($categoryName);
            }
            return [$categoryId, $categoryName];
        
    }
}
class Category{
    
}
