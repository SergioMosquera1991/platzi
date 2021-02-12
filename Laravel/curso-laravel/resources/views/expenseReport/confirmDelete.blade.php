@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Delete Report {{$report->title}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/expense_report">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/expense_report/{{$report->id}}" method="POST">
                @csrf
                @method('DELETE')
                
                <button class="btn btn-primary" type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection