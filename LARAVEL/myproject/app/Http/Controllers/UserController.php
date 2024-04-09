<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customerData =
            DB::table('customers')
            ->select('customerName as Name')
            ->where('customerNumber', '>', 100)
            ->where('customerNumber', '<', 150)
            ->limit(5)
            ->get();

        $employeeData =
            DB::table('employees')
            ->limit(5)
            ->get();

        // aggregate functions count , max , min , sum , avg

        $totalCustomers = DB::table('customers')->count();

        $maxPayment = DB::table('payments')->max('amount');

        $minPayment = DB::table('payments')->min('amount');

        $totalPayment = DB::table('payments')->sum('amount');

        $averagePayment = DB::table('payments')->avg('amount');

        #$averagePayment = DB::table('payments')->average('amount'); //alias of avg

        $customerWiseTotalPayment =
            DB::table('customers as c')
            ->join('payments as p', 'c.customerNumber', '=', 'p.customerNumber')
            ->select('c.customerNumber', DB::raw('sum(p.amount) as totalPayment'))
            ->groupBy('c.customerNumber')
            ->limit(10)
            ->get();

        $CustomerWiseTotalOrder =
            DB::table('customers as c')
            ->join('orders as o', 'c.customerNumber', '=', 'o.customerNumber')
            ->selectRaw('c.customerNumber , count(orderNumber) as totalorder')
            ->groupBy('c.customerNumber')
            ->limit(10)
            ->get();


        $employeeTotalCustomerCount =
            DB::table('employees as e')
            ->join('customers as c', 'e.employeeNumber', '=', 'c.salesRepEmployeeNumber')
            ->selectRaw('employeeNumber , count(customerNumber) as totalCustomer')
            ->groupBy('employeeNumber')
            ->having('totalCustomer', '>=', 8)
            ->limit(10)
            ->get();



        // Joins in laravel database query Builder

        $customerOrderData =
            DB::table('customers')
            ->join('orders', 'customers.customerNumber', '=', 'orders.customerNumber')
            ->select(
                'customers.customerNumber',
                'customerName',
                'creditLimit',
                'orderNumber',
                'status'
            )
            ->limit(5)
            ->get();

        $customerWhoNeverOrderData =
            DB::table('customers')
            ->leftjoin('orders', 'customers.customerNumber', '=', 'orders.customerNumber')
            ->whereNull('orderNumber')
            ->limit(10)
            ->get();

        $customerWhoNeverDonePaymentData =
            DB::table('payments')
            ->rightjoin('customers', 'customers.customerNumber', '=', 'payments.customerNumber')
            ->whereNotNull('checkNumber')
            ->limit(5)
            ->get();

        $crossProductOfCustomersAndOrdersData =
            DB::table('customers')
            ->crossJoin('orders')
            ->select('customers.customerNumber', 'orderNumber')
            ->limit(5)
            ->get();

        $selfJoinEmployeesData =
            DB::table('employees as e1')
            ->join('employees as e2', 'e1.employeeNumber', '=', 'e2.reportsTo')
            ->select(
                'e1.firstName as Manager',
                'e2.firstName as employeeName',
                'e2.employeeNumber as employeeNumber'
            )
            ->limit(10)
            ->get();




        return compact(
            'customerWiseTotalPayment',
            'CustomerWiseTotalOrder',
            'employeeTotalCustomerCount',
            'customerData',
            'employeeData',
            'totalCustomers',
            'maxPayment',
            'minPayment',
            'totalPayment',
            'averagePayment',
            'customerOrderData',
            'customerWhoNeverOrderData',
            'customerWhoNeverDonePaymentData',
            'crossProductOfCustomersAndOrdersData',
            'selfJoinEmployeesData'
        );

        // return [$totalCustomers , $maxPayment , $customerData , $employeeData , $customerOrderData] ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //insert query by Database Query Builder
        /*    
        DB::table('customers')->insert([
            'customerNumber' => '1',
            'customerName' => 'ROMAN REIGN',
            'contactLastName' => 'Reign',
            'contactFirstName' => 'Roman',
            'phone' => '40.32.2555',
            'addressLine1' => '54, rue Royale',
            'addressLine2' => 'NULL',
            'city' => 'Nantes',
            'state' => 'NULL',
            'postalCode' => '44000',
            'country' => 'California',
            'salesRepEmployeeNumber' => '1370',
            'creditLimit' => '21000.0'
        ]);
*/
        // $id =
        //     DB::table('customers')
        //     ->insertGetId([
        //         'customerNumber' => 7 , 
        //         'customerName' => 'ROMAN REIGN',
        //         'contactLastName' => 'Reign',
        //         'contactFirstName' => 'Roman',
        //         'phone' => '40.32.2555',
        //         'addressLine1' => '54, rue Royale',
        //         'addressLine2' => 'NULL',
        //         'city' => 'Nantes',
        //         'state' => 'NULL',
        //         'postalCode' => '44000',
        //         'country' => 'California',
        //         'salesRepEmployeeNumber' => '1370',
        //         'creditLimit' => '21000.0'
        //     ] );

        $result1 =
            DB::table('customers')->insertOrIgnore([
                'customerNumber' => '2',
                'customerName' => 'Jimmy Uso',
                'contactLastName' => 'Jimmy',
                'contactFirstName' => 'Uso',
                'phone' => '40.32.2555',
                'addressLine1' => '54, rue Royale',
                'addressLine2' => 'NULL',
                'city' => 'Nantes',
                'state' => 'NULL',
                'postalCode' => '44000',
                'country' => 'California',
                'salesRepEmployeeNumber' => '1370',
                'creditLimit' => '21000.0'
            ]);

        $result2 =
            DB::table('customers')->insertOrIgnore([
                'customerNumber' => '3',
                'customerName' => 'Jey Uso',
                'contactLastName' => 'Jey',
                'contactFirstName' => 'Uso',
                'phone' => '40.32.2555',
                'addressLine1' => '54, rue Royale',
                'addressLine2' => 'NULL',
                'city' => 'Nantes',
                'state' => 'NULL',
                'postalCode' => '44000',
                'country' => 'California',
                'salesRepEmployeeNumber' => '1370',
                'creditLimit' => '21000.0'
            ]);

        $result3 =
            DB::table('customers')
            ->where('customerNumber', 3)
            ->update([
                'customerName' => 'Jey Uso',
                'contactLastName' => 'Jey',
                'contactFirstName' => 'Uso',
                'phone' => '40.32.2555',
                'addressLine1' => '54, rue Royale',
                'addressLine2' => 'NULL',
                'city' => 'fensicalifornia',
                'state' => 'NULL',
                'postalCode' => '55555',
                'country' => 'California',
                'salesRepEmployeeNumber' => '1370',
                'creditLimit' => '1000'
            ]);


        $result4 =
            DB::table('customers')
            ->upsert(
                [
                    'customerNumber' => 4,
                    'customerName' => 'Jey Uso',
                    'contactLastName' => 'Jey',
                    'contactFirstName' => 'Uso',
                    'phone' => '11111111',
                    'addressLine1' => '54, rue Royale',
                    'addressLine2' => 'NULL',
                    'city' => 'fensicalifornia',
                    'state' => 'NULL',
                    'postalCode' => '55555',
                    'country' => 'California',
                    'salesRepEmployeeNumber' => '1370',
                    'creditLimit' => '1000'
                ],
                ['customerNumber']
            );

        $result5 =
            DB::table('customers')
            ->updateOrInsert(
                ['customerNumber' => 4],
                [
                    'customerName' => 'Jey Uso',
                    'contactLastName' => 'Jey',
                    'contactFirstName' => 'Uso',
                    'phone' => '11122111',
                    'addressLine1' => '54, rue Royale',
                    'addressLine2' => 'NULL',
                    'city' => 'fensicalifornia',
                    'state' => 'NULL',
                    'postalCode' => '55555',
                    'country' => 'California',
                    'salesRepEmployeeNumber' => '1370',
                    'creditLimit' => '1000'
                ]
            );

        $result6 = DB::table('customers')->increment('creditLimit');

        $result7 = DB::table('customers')->decrement('creditLimit');

        $result8 = DB::table('customers')->increment('creditLimit', 10);

        $result9 = DB::table('customers')->decrement('creditLimit', 5);

        //incrementEach and decrementEach function takes array of key value to incre or decre multiple columns

        // $result10 = DB::table('customers')->where('customerNumber' , 4)->delete();

        // $result11 = DB::table('customers')->where('customerNumber' , 7)->delete();

        // $result11 = DB::table('customers')->truncate();

        return compact(
            'result1',
            'result2',
            'result3',
            'result4',
            'result5',
            'result6',
            'result7',
            'result8',
            'result9',
            'result10',
            'result11'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function contact($name, $number)
    {

        return view('contact', compact('name', 'number'));
    }
}
