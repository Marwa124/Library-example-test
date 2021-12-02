@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        View Book
    </div>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Book Name
                        </th>
                        <td>
                            {{ $book->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Book Serial
                        </th>
                        <td>
                            {{ $book->serial }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Book Type
                        </th>
                        <td>
                            {{ App\Models\Book::TYPE_SELECT[$book->type] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-link" href="{{ route('books.index') }}">
                    Back
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
