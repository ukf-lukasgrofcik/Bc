<?php

namespace App\Http\Controllers;

use App\Models\BaseModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BaseController extends Controller
{

    protected $filter; // Filter
    protected $route_name; // Route name after filter

    /**
     * Set alert
     * @param $type string type of alert
     * @param $message string message of alert
     */
    protected function _setFlashMessage($type, $message){
        request()->session()->flash('type', $type);
        request()->session()->flash('message', $message);
    }

    /**
     * Get filters if saved or save new
     * @param string|bool $filter optional filter name
     * @param string|bool $route optional route
     * @return bool|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector redirect
     */
    protected function check_filters($filter = false, $route = false){
        $filter = $filter ? $filter : $this->filter; // Set default filter if none
        $route = $route ? $route : route($this->route_name); // Set default route if none

        $query = request()->query();

        if(empty($query) && session()->exists($filter)) // If query empty and session exists
            return redirect($route.'?'.http_build_query(session()->pull($filter))); // Return redirect with query


        if(!empty($query)) // If query not empty
            session()->put($filter, $query); // Put query into session


        return false; // Return false = no redirect
    }

    /**
     * Reset filter
     * @param string|bool $filter optional filter name
     * @param string|bool $route_name optional route name
     * @return \Illuminate\Http\RedirectResponse redirect
     */
    public function reset_filter($filter = false, $route_name = false){
        $filter = $filter ? $filter : $this->filter; // Set default filter if none
        $route_name = $route_name ? $route_name : $this->route_name; // Set default route name if none

        session()->forget($filter); // Forget filter session

        return redirect()->route($route_name); // Return route by name
    }

}
