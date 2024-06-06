<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Custom;
use App\Models\Expense;
use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Models\Maintainer;
use App\Models\MaintenanceRequest;
use App\Models\NoticeBoard;
use App\Models\Order;
use App\Models\Property;
use App\Models\PropertyUnit;
use App\Models\Support;
use App\Models\Tenant;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        if (\Auth::check()) {
            $data['totalNote'] = NoticeBoard::where('parent_id', parentId())->count();
            $data['totalContact'] = Contact::where('parent_id', parentId())->count();
            $data['totalSupport'] = Support::where('created_id', parentId())->orWhere('assign_user', parentId())->count();
            $data['todaySupport'] = Support::whereDate('created_at', '=', date('Y-m-d'))->where('created_id', parentId())->orWhere('assign_user', parentId())->count();

            if (\Auth::user()->type == 'tenant') {
                $tenant=Tenant::where('user_id',\Auth::user()->id)->first();
                $data['totalInvoice']=Invoice::where('property_id',$tenant->property)->where('unit_id',$tenant->unit)->count();
                $data['unit']=PropertyUnit::find($tenant->unit);

                return view('dashboard.tenant', compact('data','tenant'));
            }

            if (\Auth::user()->type == 'maintainer') {
                $maintainer=Maintainer::where('user_id',\Auth::user()->id)->first();
                $data['totalRequest']=MaintenanceRequest::where('maintainer_id',\Auth::user()->id)->count();
                $data['todayRequest']=MaintenanceRequest::whereDate('request_date', '=', date('Y-m-d'))->where('maintainer_id',\Auth::user()->id)->count();

                return view('dashboard.maintainer', compact('data','maintainer'));
            }

            $data['totalProperty'] = Property::where('parent_id', parentId())->count();
            $data['totalUnit'] = PropertyUnit::where('parent_id', parentId())->count();
            $data['totalIncome'] = InvoicePayment::where('parent_id', parentId())->sum('amount');
            $data['totalExpense'] = Expense::where('parent_id', parentId())->sum('amount');
            $data['recentProperty'] = Property::where('parent_id', parentId())->orderby('id', 'desc')->limit(5)->get();
            $data['recentTenant'] = Tenant::where('parent_id', parentId())->orderby('id', 'desc')->limit(5)->get();
            $data['incomeExpenseByMonth'] = $this->incomeByMonth();
            $data['settings']=settings();


            return view('dashboard.index', compact('data'));
        } else {
            if (!file_exists(storage_path() . "/installed")) {
                header('location:install');
                die;
            } else {
                $landingPage=getSettingsValByName('landing_page');

                if($landingPage=='on'){
                    return view('layouts.landing');
                }else{
                    return redirect()->route('login');
                }
            }

        }

    }


    public function incomeByMonth()
    {
        $start = strtotime(date('Y-01'));
        $end = strtotime(date('Y-12'));

        $currentdate = $start;

        $payment = [];
        while ($currentdate <= $end) {
            $payment['label'][] = date('M-Y', $currentdate);

            $month = date('m', $currentdate);
            $year = date('Y', $currentdate);
            $payment['income'][] = InvoicePayment::where('parent_id', parentId())->whereMonth('payment_date', $month)->whereYear('payment_date', $year)->sum('amount');
            $payment['expense'][] = Expense::where('parent_id', parentId())->whereMonth('date', $month)->whereYear('date', $year)->sum('amount');
            $currentdate = strtotime('+1 month', $currentdate);
        }

        return $payment;

    }

}
