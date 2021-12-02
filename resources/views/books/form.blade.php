@extends('layouts.app')
@inject('booksModel', 'App\Models\Book')
@section('content')

<div class="card">
    <div class="card-header">
        Create Book
    </div>

    <div class="card-body">
        <form method="POST" action="{{ $book ? route("books.update", [$book->id]) : route("books.store") }}">
            @if ($book) @method('PUT')  @endif

            @csrf

            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" value="{{ old('name', $book->name ?? '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="serial">Serial</label>
                <input class="form-control {{ $errors->has('serial') ? 'is-invalid' : '' }}" type="text"  name="serial" value="{{ old('serial', $book->serial ?? '') }}">
                @if($errors->has('serial'))
                    <div class="invalid-feedback">
                        {{ $errors->first('serial') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="type_id">Type</label>
                    @foreach($booksModel::TYPE_SELECT as $key => $label)
                        <div class="form-check {{ $errors->has('type') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="type_{{ $key }}" name="type" value="{{ $key }}" {{ old('type', $book->type ?? '') === (string) $key ? 'checked' : '' }} required>
                            <label class="form-check-label" for="type_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                {{-- <select class="form-control select2 {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type_id">
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>Select book type</option>
                    @foreach($booksModel::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', '') === (string) $key ? 'selected' : '' }} required>{{ $label }}</option>
                    @endforeach
                </select> --}}
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Save
                </button>
                <a href="{{route('books.index')}}" class="btn btn-primary mr-auto" >
                    Back
                </a>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')

@endsection
