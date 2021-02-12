@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Reports</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href="/expense_report/create">Create Report</a>
            </div>
        </div>
                <table class="table">
                    @foreach($expenseReport as $expenseReport)
                        <tr>
                            <td>
                                <td><a href="/expense_report/{{$expenseReport->id}}">{{$expenseReport->title}}</a></td>
                                <td><a href="/expense_report/{{$expenseReport->id}}/edit" class="btn btn-warning">Edit</a></td>
                                <td><a href="/expense_report/{{$expenseReport->id}}/confirmDelete" class="btn btn-danger">Delete</a></td>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
        
