@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>New Expense</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/expense_report/{{ $report->id }}">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/expense_report/{{ $report->id }}/expenses" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Description:</label>
                    <input type=text class="form-control" id="description" name="description" placeHolder="Description" value="{{ old('description') }}">
                </div>

                <div class="form-group">
                    <label for="title">Amount:</label>
                    <input type=text class="form-control" id="amount" name="amount" placeHolder="Amount" value="{{ old('amount') }}">
                </div>

                <button class="btn btn-primary" type="submit">Guardar</button>
            </form>
        </div>
    </div>
@endsection