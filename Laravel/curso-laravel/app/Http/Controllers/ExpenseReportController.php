<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\ExpenseReport;
use App\Mail\SummaryReport;
use App\Mail\Email;

class ExpenseReportController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return ExpenseReport::all();
        return view('expenseReport.index', [
            'expenseReport' => ExpenseReport::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenseReport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|min:3'],
            ['title.required' => 'El titulo es requerido por favor', 
            'title.min' => 'El titulo es mínimo 3 caracteres por favor']);

        $report = new ExpenseReport();
        //$report->title = $request->get('title');
        $report->title = $validate['title'];
        $report->save();

        return redirect('/expense_report');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseReport $expenseReport)
    {
        //$report = ExpenseReport::findOrFail($id);
      
        return view('expenseReport.show', [
            'report' => $expenseReport
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = ExpenseReport::findOrFail($id);

        return view('expenseReport.edit', [
            'report' => $report
            ]);
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
        $report = ExpenseReport::find($id);
        $report->title = $request->get('title');
        $report->save();

        return redirect('/expense_report');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = ExpenseReport::find($id);
        $report->delete();

        return redirect('/expense_report');
    }

    public function confirmDelete($id)
    {
        $report = ExpenseReport::find($id);
        return view('expenseReport.confirmDelete', [
            'report' => $report
            ]);
    }

    public function confirmSendEmail($id)
    {
        $report = ExpenseReport::find($id);
        return view('expenseReport.confirmSendEmail', [
            'report' => $report
            ]);
    }

    public function sendEmail(Request $request, $id)
    {
        //dd($request);
        $report = ExpenseReport::find($id);

        Mail::to($request->get('email'))->send(new SummaryReport($report));
        
        return redirect('/expense_report/' . $id);
    }
}
