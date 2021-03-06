@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Author</div>

                    <div class="panel-body">
                        <form action="{{ route('authors.store') }}" method="post">
                            {{ csrf_field() }}
                            First name:
                            <br />
                            <input type="text" name="first_name" value="{{ old('first_name') }}" />
                            <br /><br />
                            Last name:
                            <br />
                            <input type="text" name="last_name" value="{{ old('last_name') }}" />
                            <br /><br />
                            <input type="submit" value="Submit" class="btn btn-default" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection