@extends('layouts.app')
@inject('booksModel', 'App\Models\Book')
@section('content')

<div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('books.create') }}">
                Add Book
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        Books List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Id
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Serial
                        </th>
                        <th>
                            Type
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr data-entry-id="{{ $book->id }}">
                            <td>

                            </td>
                            <td>
                                {{$loop->iteration ?? ''}}
                            </td>
                            <td>
                                {{ $book->name ?? '' }}
                            </td>
                            <td>
                                {{ $book->serial ?? '' }}
                            </td>
                            <td>
                                {{ $booksModel::TYPE_SELECT[$book->type] ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('books.show', $book->id) }}">
                                    View
                                </a>

                                <a class="btn btn-xs btn-info" href="{{ route('books.edit', $book->id) }}">
                                    Edit
                                </a>

                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are You Sure?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                </form>
                            </td>
                        </tr>

                        {{$books->links()}}
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            No content has been found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
