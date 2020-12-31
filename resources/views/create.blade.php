@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <form action="{{ route('store') }}" method="POST">
                        @csrf
                        <label>title:</label>
                        <input type="text" class="form-control" name="title">
                        <label>description:</label>
                        <input type="text" class="form-control" name="description">
                        <button class="btn btn-primary w-40">save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
