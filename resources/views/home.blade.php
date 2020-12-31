@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <p>Dashboard</p>
                    <form action="{{ route('create') }}">
                        @csrf
                        <input type="submit" value="Create New">
                    </form>
                </div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered gridview">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>User ID</th>
                        </tr>
                        <tr>
                            @foreach ($product as $value)
                                <tr>
                                    <td>{{++$loop->index}}</td>
                                    <td>{{$value->title}}</td>
                                    <td>{{$value->description}}</td>
                                    <td>{{$value->user_id}}</td>
                                    <td>
                                        @if ($value->user_id==Auth::user()->id)
                                            <form action="{{ route('delete') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $value->id }}"></input>
                                                <button>Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
