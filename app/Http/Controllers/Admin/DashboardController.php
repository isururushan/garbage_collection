<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourPackages;
use App\Models\Tickets;


class DashboardController extends Controller
{
    public function index(){ 
        return view('admin.dashboard.index');
    }

    public function fetchTours(Request $request)
    {
        $overall = $request->overall;
        $last_7_days = $request->last_7_days;
        $last_30_days = $request->last_30_days;

        $current_date = date("Y-m-d");
        $date = strtotime($current_date);
        $date = strtotime("-7 day", $date);
        $week_date = date("Y-m-d", $date);

        $date = strtotime($current_date);
        $date = strtotime("-30 day", $date);
        $month_date = date("Y-m-d", $date);

        if($overall == 1)
        {
            return $total_tours = TourPackages::where('deleted',0)->get()->count();
        }
        else if($last_7_days == 1)
        {
            return $total_tours = TourPackages::where('created_at', '>=', $week_date)->where('deleted',0)->get()->count();
        }
        else if($last_30_days == 1)
        {
            return $total_tours = TourPackages::where('created_at','>=',$month_date)->where('deleted',0)->get()->count();
        }
 
    }

    public function fetchTickets(Request $request)
    {
        $overall = $request->overall;
        $last_7_days = $request->last_7_days;
        $last_30_days = $request->last_30_days;

        $current_date = date("Y-m-d");
        $date = strtotime($current_date);
        $date = strtotime("-7 day", $date);
        $week_date = date("Y-m-d", $date);

        $date = strtotime($current_date);
        $date = strtotime("-30 day", $date);
        $month_date = date("Y-m-d", $date);

        if($overall == 1)
        {
            return $total_tickets = Tickets::where('deleted',0)->get()->count();
        }
        else if($last_7_days == 1)
        {
            return $total_tickets = Tickets::where('created_at', '>=', $week_date)->where('deleted',0)->get()->count();
        }
        else if($last_30_days == 1)
        {
            return $total_tickets = Tickets::where('created_at', '>=', $month_date)->where('deleted',0)->get()->count();
        }
 
    }
    public function fetchTotal(Request $request)
    {
        $overall = $request->overall;
        $last_7_days = $request->last_7_days;
        $last_30_days = $request->last_30_days;

        $current_date = date("Y-m-d");
        $date = strtotime($current_date);
        $date = strtotime("-7 day", $date);
        $week_date = date("Y-m-d", $date);

        $date = strtotime($current_date);
        $date = strtotime("-30 day", $date);
        $month_date = date("Y-m-d", $date);

        if($overall == 1)
        {
            $tour = TourPackages::where('deleted',0)->get()->count();
            $tickets =Tickets::where('deleted',0)->get()->count();

            return $total = $tour + $tickets;
        }
        else if($last_7_days == 1)
        {
             $tour = TourPackages::where('created_at', '>=', $week_date)->where('deleted',0)->get()->count();
            $tickets =Tickets::where('created_at', '>=', $week_date)->where('deleted',0)->get()->count();

            return $total = $tour + $tickets;
        }
        else if($last_30_days == 1)
        {
             $tour = TourPackages::where('created_at', '>=', $month_date)->where('deleted',0)->get()->count();
            $tickets =Tickets::where('created_at', '>=', $month_date)->where('deleted',0)->get()->count();

            return $total = $tour + $tickets;
        }
    }


    // public function fetchOrders(Request $request)
    // {
    //     $overall = $request->overall;
    //     $last_7_days = $request->last_7_days;
    //     $last_30_days = $request->last_30_days;

    //     $current_date = date("Y-m-d");
    //     $date = strtotime($current_date);
    //     $date = strtotime("-7 day", $date);
    //     $week_date = date("Y-m-d", $date);

    //     $date = strtotime($current_date);
    //     $date = strtotime("-30 day", $date);
    //     $month_date = date("Y-m-d", $date);

    //     if($overall == 1)
    //     {
    //         return $total_order = Orders::get()->count();
    //     }
    //     else if($last_7_days == 1)
    //     {
    //         return $total_order = Orders::where('created_at', '>=', $week_date)->get()->count();
    //     }
    //     else if($last_30_days == 1)
    //     {
    //         return $total_order = Orders::where('created_at','>=',$month_date)->get()->count();
    //     }
 
    // }

    // public function fetchRentOrders(Request $request)
    // {
    //     $overall = $request->overall;
    //     $last_7_days = $request->last_7_days;
    //     $last_30_days = $request->last_30_days;

    //     $current_date = date("Y-m-d");
    //     $date = strtotime($current_date);
    //     $date = strtotime("-7 day", $date);
    //     $week_date = date("Y-m-d", $date);

    //     $date = strtotime($current_date);
    //     $date = strtotime("-30 day", $date);
    //     $month_date = date("Y-m-d", $date);

    //     if($overall == 1)
    //     {
    //         return $total_rent_order = RentOrders::get()->count();
    //     }
    //     else if($last_7_days == 1)
    //     {
    //         return $total_rent_order = RentOrders::where('created_at', '>=', $week_date)->get()->count();
    //     }
    //     else if($last_30_days == 1)
    //     {
    //         return $total_rent_order = RentOrders::where('created_at', '>=', $month_date)->get()->count();
    //     }
 
    // }
    // public function fetchOrderTotal(Request $request)
    // {
    //     $overall = $request->overall;
    //     $last_7_days = $request->last_7_days;
    //     $last_30_days = $request->last_30_days;

    //     $current_date = date("Y-m-d");
    //     $date = strtotime($current_date);
    //     $date = strtotime("-7 day", $date);
    //     $week_date = date("Y-m-d", $date);

    //     $date = strtotime($current_date);
    //     $date = strtotime("-30 day", $date);
    //     $month_date = date("Y-m-d", $date);

    //     if($overall == 1)
    //     {
    //         $total_order = Orders::get()->count();
    //         $total_rent_order =RentOrders::get()->count();

    //         return $total_summary = $total_order + $total_rent_order;
    //     }
    //     else if($last_7_days == 1)
    //     {
    //         $total_order = Orders::where('created_at', '>=', $week_date)->get()->count();
    //         $total_rent_order =RentOrders::where('created_at', '>=', $week_date)->get()->count();

    //         return $total_summary = $total_order + $total_rent_order;
    //     }
    //     else if($last_30_days == 1)
    //     {
    //         $total_order = Orders::where('created_at', '>=', $month_date)->get()->count();
    //         $total_rent_order =RentOrders::where('created_at', '>=', $month_date)->get()->count();

    //         return $total_summary = $total_order + $total_rent_order;
    //     }
    // }

    // public function fetchSuccessOrders(Request $request)
    // {
    //     $overall = $request->overall;
    //     $last_7_days = $request->last_7_days;
    //     $last_30_days = $request->last_30_days;

    //     $current_date = date("Y-m-d");
    //     $date = strtotime($current_date);
    //     $date = strtotime("-7 day", $date);
    //     $week_date = date("Y-m-d", $date);

    //     $date = strtotime($current_date);
    //     $date = strtotime("-30 day", $date);
    //     $month_date = date("Y-m-d", $date);

    //     if($overall == 1)
    //     {
    //         return $order_success =RentOrders::where('rented_status', 2)->get()->count();
    //     }
    //     else if($last_7_days == 1)
    //     {
    //         return $order_success =RentOrders::where('rented_status', 2)->where('created_at', '>=', $week_date)->get()->count();
    //     }
    //     else if($last_30_days == 1)
    //     {
    //         return $order_success = RentOrders::where('rented_status', 2)->where('created_at', '>=', $month_date)->get()->count();
    //     }

       
    // }
    // public function fetchPendingOrders(Request $request)
    // {
    //     $overall = $request->overall;
    //     $last_7_days = $request->last_7_days;
    //     $last_30_days = $request->last_30_days;

    //     $current_date = date("Y-m-d");
    //     $date = strtotime($current_date);
    //     $date = strtotime("-7 day", $date);
    //     $week_date = date("Y-m-d", $date);

    //     $date = strtotime($current_date);
    //     $date = strtotime("-30 day", $date);
    //     $month_date = date("Y-m-d", $date);

    //     if($overall == 1)
    //     {
    //         return $order_pending =RentOrders::where('rented_status', 0)->get()->count();
    //     }
    //     else if($last_7_days == 1)
    //     {
    //         return $order_pending =RentOrders::where('rented_status', 0)->where('created_at', '>=', $week_date)->get()->count();
    //     }
    //     else if($last_30_days == 1)
    //     {
    //         return $order_pending = RentOrders::where('rented_status', 0)->where('created_at', '>=', $month_date)->get()->count();
    //     }

       
    // }
    // public function fetchRentedOrders(Request $request)
    // {
    //     $overall = $request->overall;
    //     $last_7_days = $request->last_7_days;
    //     $last_30_days = $request->last_30_days;

    //     $current_date = date("Y-m-d");
    //     $date = strtotime($current_date);
    //     $date = strtotime("-7 day", $date);
    //     $week_date = date("Y-m-d", $date);

    //     $date = strtotime($current_date);
    //     $date = strtotime("-30 day", $date);
    //     $month_date = date("Y-m-d", $date);

    //     if($overall == 1)
    //     {
    //         return $order_rented =RentOrders::where('rented_status', 1)->get()->count();
    //     }
    //     else if($last_7_days == 1)
    //     {
    //         return $order_rented =RentOrders::where('rented_status', 1)->where('created_at', '>=', $week_date)->get()->count();
    //     }
    //     else if($last_30_days == 1)
    //     {
    //         return $order_rented = RentOrders::where('rented_status', 1)->where('created_at', '>=', $month_date)->get()->count();
    //     }
  
    // }

    // public function fetchTotalEarnedOrders(Request $request)
    // {
    //     $overall = $request->overall;
    //     $last_7_days = $request->last_7_days;
    //     $last_30_days = $request->last_30_days;

    //     $current_date = date("Y-m-d");
    //     $date = strtotime($current_date);
    //     $date = strtotime("-7 day", $date);
    //     $week_date = date("Y-m-d", $date);

    //     $date = strtotime($current_date);
    //     $date = strtotime("-30 day", $date);
    //     $month_date = date("Y-m-d", $date);

    //     if($overall == 1)
    //     {
    //         $total_earned_orders =Orders::sum('sub_total');

    //         return $total_earned_orders;
    //     }
    //     else if($last_7_days == 1)
    //     {
    //         $total_earned_orders =Orders::where('created_at', '>=', $week_date)->sum('sub_total');

    //         return $total_earned_orders;
    //     }
    //     else if($last_30_days == 1)
    //     {
    //         $total_earned_orders =Orders::where('created_at', '>=', $month_date)->sum('sub_total');

    //         return $total_earned_orders;
    //     }
    // }

   

    // public function fetchSellingProduct(Request $request)
    // {
    //     $overall = $request->overall;
    //     $last_7_days = $request->last_7_days;
    //     $last_30_days = $request->last_30_days;

    //     $current_date = date("Y-m-d");
    //     $date = strtotime($current_date);
    //     $date = strtotime("-7 day", $date);
    //     $week_date = date("Y-m-d", $date);

    //     $date = strtotime($current_date);
    //     $date = strtotime("-30 day", $date);
    //     $month_date = date("Y-m-d", $date);

    //     if($overall == 1)
    //     {
    //         $top_selling_products = Products::where('deleted',0)->orderBy('price','desc')->limit(4)->get();

    //         foreach($top_selling_products as $top_selling_product)

    //         {
    //             $originalDate = $top_selling_product['created_at'];
    //             $top_selling_product['created'] = date("d-m-Y", strtotime($originalDate));

    //             $product_images = ProductHasImages::where('deleted',0)->where('products_id', $top_selling_product['id'])->first();
    //             $top_selling_product['imagename'] = $product_images['image'];

    //         }
    //         return $top_selling_products;
    //     }
    //     else if($last_7_days == 1)
    //     {
    //         $top_selling_products = Products::where('deleted',0)->orderBy('price','desc')->where('created_at', '>=', $week_date)->limit(4)->get();

    //         foreach($top_selling_products as $top_selling_product)

    //         {
    //             $originalDate = $top_selling_product['created_at'];
    //             $top_selling_product['created'] = date("d-m-Y", strtotime($originalDate));

    //             $product_images = ProductHasImages::where('products_id', $top_selling_product['id'])->first();
    //             $top_selling_product['imagename'] = $product_images['image'];

    //         }
    //         return $top_selling_products;

    //     }
    //     else if($last_30_days == 1)
    //     {
    //         $top_selling_products = Products::where('deleted',0)->orderBy('price','desc')->where('created_at', '>=', $month_date)->limit(4)->get();

    //         foreach($top_selling_products as $top_selling_product)

    //         {
    //             $originalDate = $top_selling_product['created_at'];
    //             $top_selling_product['created'] = date("d-m-Y", strtotime($originalDate));

    //             $product_images = ProductHasImages::where('products_id', $top_selling_product['id'])->first();
    //             $top_selling_product['imagename'] = $product_images['image'];

    //         }
    //         return $top_selling_products;
    //     }    
    // }

    // public function fetchTopServices(Request $request)
    // {
    //     $overall = $request->overall;
    //     $last_7_days = $request->last_7_days;
    //     $last_30_days = $request->last_30_days;

    //     $current_date = date("Y-m-d");
    //     $date = strtotime($current_date);
    //     $date = strtotime("-7 day", $date);
    //     $week_date = date("Y-m-d", $date);

    //     $date = strtotime($current_date);
    //     $date = strtotime("-30 day", $date);
    //     $month_date = date("Y-m-d", $date);

    //     if($overall == 1)
    //     {
    //         $top_services = Services::where('deleted',0)->orderBy('price','desc')->limit(4)->get();

    //         foreach($top_services as $top_service)

    //         {
    //             $originalDate = $top_service['created_at'];
    //             $top_service['created'] = date("d-m-Y", strtotime($originalDate));

    //             $services_images = ServiceHasImages::where('deleted',0)->where('services_id', $top_service['id'])->first();
    //             $top_service['imagename'] = $services_images['image'];

    //         }
    //         return $top_services;
    //     }
    //     else if($last_7_days == 1)
    //     {
    //         $top_services = Services::where('deleted',0)->orderBy('price','desc')->where('created_at', '>=', $week_date)->limit(4)->get();

    //         foreach($top_services as $top_service)

    //         {
    //             $originalDate = $top_service['created_at'];
    //             $top_service['created'] = date("d-m-Y", strtotime($originalDate));

    //             $services_images = ServiceHasImages::where('services_id', $top_service['id'])->first();
    //             $top_service['imagename'] = $services_images['image'];

    //         }
    //         return $top_services;

    //     }
    //     else if($last_30_days == 1)
    //     {
    //         $top_services = Services::where('deleted',0)->orderBy('price','desc')->where('created_at', '>=', $month_date)->limit(4)->get();

    //         foreach($top_services as $top_service)

    //         {
    //             $originalDate = $top_service['created_at'];
    //             $top_service['created'] = date("d-m-Y", strtotime($originalDate));

    //             $services_images = ServiceHasImages::where('services_id', $top_service['id'])->first();
    //             $top_service['imagename'] = $services_images['image'];

    //         }
    //         return $top_services;
    //     }    
    // }
}
