<?php

namespace App\Http\Controllers\Api\V1\Admin;

// use Illuminate\Http\Request;
// use App\Http\Requests\TicketCategoryRequest;
use App\Ticket;
use App\Category;
use Carbon\Carbon;

class DashboardApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
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
    public function weekTicket($from, $to){
        // $to = Carbon::now()->subWeek()->format("yy-m-d h:m:s");
        $data = Ticket::whereBetween('created_at',[$to, $from])
        ->get()
        ->groupBy(function($to){
            return Carbon::parse($to->created_at)->format('D');////esto lo saca por dia de las semana en ingles Mon = lunes y así    
        });
        
        if(count($data) > 0){
            if (isset($data['Mon']) == false){$lunes = 0;}
            else{
                if (count($data['Mon']) > 0){$lunes = count($data['Mon']);}
                else{$lunes = 0;}}
                if(isset($data['Tue']) == false){$martes = 0;}
                else{
                    if (count($data['Tue']) > 0){$martes = count($data['Tue']);}
                    else{$martes = 0;}}
            if(isset($data['Wed']) == false){$miercoles = 0;}
            else{
                if (count($data['Wed']) > 0){$miercoles = count($data['Wed']);}
                else{$miercoles = 0;}}
                if(isset($data['Thu']) == false){$jueves = 0;}
                else{
                    if (count($data['Thu']) > 0){$jueves = count($data['Thu']);}
                else{$jueves = 0;}}
                if(isset($data['Fri']) == false){$viernes = 0;}
                else{
                    if (count($data['Fri']) > 0){$viernes = count($data['Fri']);}
                    else{$viernes = 0;}}
                    if(isset($data['Sat']) == false){$sabado = 0;}
                    else{
                        if (count($data['Sat']) > 0){$sabado = count($data['Sat']);}
                else{$sabado = 0;}}
            }
            else{
                $lunes = 0; $martes = 0; $miercoles = 0; $jueves = 0; $viernes = 0; $sabado = 0;
        }
        
        $diasemana = [$lunes, $martes, $miercoles, $jueves, $viernes, $sabado];
        return $diasemana;
        
    }
    public function countCategoryTicket($from, $firstDayMonth, $category){
        
        //asi se obtiene el nombre
        $data = Ticket::whereBetWeen('tickets.created_at', [$firstDayMonth, $from])->where('tickets.category_id', $category)
        ->join('categories', 'tickets.category_id','categories.id')
        ->get(['tickets.category_id',])->groupBy('category_id');
        
        //realizar un recorrido y validar que no esta vacio, si lo está asignarle el valor 0
        if (count($data) > 0){
            foreach ($data as $key => $value){
                $option = ($data == '') ? '0' : $key;//me da el id de la categoria
                //en categoria_id guarda el número de la categoria y en Total guarda el total de la cuenta que tenga el id de la cantegoria ↓
                $data[] = ['category_id' => $option, 'Total' => count($data[$key])]; //aqui guarda lo que se envió 
                unset($data[$key]);//destruir el dato que se le paso
            }
        }
        else{
            
            $data[] = ['category_id' => $category, 'Total' => 0];
        }
        $categoryId = [];
        $categoryTotal = [];
        foreach ($data as $categorys){
            array_push($categoryId, $categorys['category_id']);
            array_push($categoryTotal, $categorys['Total']);
        }
        return [$categoryId, $categoryTotal]; 
    }
}
