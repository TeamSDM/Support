<?php

namespace App\Http\Controllers\Admin;


use Gate;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\V1\Admin\DashboardApiController;
use Symfony\Component\HttpFoundation\Response;
 
// use App\Http\Requests\TicketCategoryRequest;
use App\Ticket;
use App\Category;
use Carbon\Carbon;

class HomeController
{
    protected $DashboardApiController;
    // protected $countCategoryTicket;
    public function __construct()
    {
       $this->DashboardApiController = new DashboardApiController();
    }
    
    public function index()
    {

        abort_if(Gate::denies('dashboard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $totalTickets = Ticket::count();//← todos los ticket 
        //tickets con el estado nuevo ↓
        $openTickets = Ticket::whereHas('status', function($query) {
            $query->whereName('Nuevo');})->count();
        //token con el estado resueltos ↓
        $closedTickets = Ticket::whereHas('status', function($query) {
            $query->whereName('Resuelto');})->count();

        $from = Carbon::now();//dia de hoy, actual
        $to = Carbon::now()->subWeek()->format("yy-m-d h:m:s");//fecha de la semana pasada. ejemplo (hoy = 22/07 ; fecha semana atras = 15/07)
        $firstDayMonth = Carbon::now()->startOfMonth();//primer dia del mes presente 
        
        $weekTicket = $this->DashboardApiController->weekTicket($from, $to);
        $categoryApoteosys    = $this->DashboardApiController->countCategoryTicket($from, $firstDayMonth, 1);
        $categoryAurora       = $this->DashboardApiController->countCategoryTicket($from, $firstDayMonth, 2);
        $categoryCanalDigital = $this->DashboardApiController->countCategoryTicket($from, $firstDayMonth, 3);
        $categoryCartera      = $this->DashboardApiController->countCategoryTicket($from, $firstDayMonth, 4);
        $categoryCobranza     = $this->DashboardApiController->countCategoryTicket($from, $firstDayMonth, 5);
        $categoryCyL          = $this->DashboardApiController->countCategoryTicket($from, $firstDayMonth, 6);
        $categoryOportudata   = $this->DashboardApiController->countCategoryTicket($from, $firstDayMonth, 7);
        $categoryOtros        = $this->DashboardApiController->countCategoryTicket($from, $firstDayMonth, 8);
        $categoryRedes        = $this->DashboardApiController->countCategoryTicket($from, $firstDayMonth, 9);
        $categorySeF          = $this->DashboardApiController->countCategoryTicket($from, $firstDayMonth, 10);
        $categorySoH          = $this->DashboardApiController->countCategoryTicket($from, $firstDayMonth, 11);
        $categoryTB           = $this->DashboardApiController->countCategoryTicket($from, $firstDayMonth, 12);
        $categoryTP           = $this->DashboardApiController->countCategoryTicket($from, $firstDayMonth, 13); 

        $categorias = Ticket::get(['category_id'])->groupBy('category_id');//aqui estan agrupados los ticket por categoria
        $categories = Category::get(['id','name']);//aqui estan todos las categorias
        
        
        return view('home', compact('totalTickets', 'openTickets', 'closedTickets', 'categories','categoryApoteosys', 'categoryAurora', 'categoryCanalDigital', 'categoryCartera', 'categoryCobranza', 'categoryCyL', 'categoryOportudata', 'categoryOtros', 'categoryRedes', 'categorySeF', 'categorySoH', 'categoryTB', 'categoryTP', 'weekTicket'));      
    }         
}
