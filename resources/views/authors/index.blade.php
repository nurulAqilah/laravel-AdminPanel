@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Authors</div>

                    @if (session('message'))
                        <div class="alert alert-info">{{ session('message') }}</div>
                    @endif 

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

                    <a href="{{ route('authors.create') }}" class="btn btn-default">Add New Author</a>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($authors as $author)
                                <tr>
                                    <td>{{ $author->first_name }}</td>
                                    <td>{{ $author->last_name }}</td>
                                    <td>
                                        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-default">Edit</a>
                                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST"
                                              style="display: inline"
                                              onsubmit="return confirm('Are you sure?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No entries found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $authors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection	