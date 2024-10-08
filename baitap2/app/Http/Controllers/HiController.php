<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class HiController extends Controller
{

    #query builder
    public function pubai1()
    {
        $sales = DB::table('sales')
            ->select(
                DB::raw('SUM(total) as total_sales'),
                DB::raw('EXTRACT(MONTH FROM sale_date) as month'),
                DB::raw('EXTRACT(YEAR FROM sale_date) as year')
            )
            ->groupBy(DB::raw('EXTRACT(MONTH FROM sale_date)'), DB::raw('EXTRACT(YEAR FROM sale_date)'));

        $one2 = $sales->toSql();
        dd($one2);
    }

    public function pubai2()
    {
        $expensesData = DB::table('expenses')
            ->select(
                DB::raw('SUM(amount) as total_expenses'),
                DB::RAW('EXTRACT(MONTH FROM expense_date) as month'),
                DB::RAW('EXTRACT(YEAR FROM expense_date) as year')
            )
            ->groupBy(DB::raw('MONTH(expense_date)'), DB::raw('YEAR(expense_date)'));
        $one2 = $expensesData->toSql();
        dd($one2);
    }

    #eloquent
    public function pubai3()
    {
        $sales = Sale::select(
            DB::raw('SUM(total) as total_sales'),
            DB::raw('EXTRACT(MONTH FROM sale_date) as month'),
            DB::raw('EXTRACT(YEAR FROM sale_date) as year')
        )
            ->groupBy(DB::raw('EXTRACT(MONTH FROM sale_date)'), DB::raw('EXTRACT(YEAR FROM sale_date)'));
            $one2 = $sales->toSql();
            dd($one2);
    }

    public function pubai4()
    {
        $expensesData = Expense::select(
            DB::raw('SUM(amount) as total_expenses'),
            DB::RAW('EXTRACT(MONTH FROM expense_date) as month'),
            DB::RAW('EXTRACT(YEAR FROM expense_date) as year')
        )
            ->groupBy(DB::raw('MONTH(expense_date)'), DB::raw('YEAR(expense_date)'));
        $one2 = $expensesData->toSql();
        dd($one2);
    }
}
