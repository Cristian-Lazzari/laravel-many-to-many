@extends('layouts.base')

@section('contents')

<form class="cont_a" method="POST" action="{{ route('admin.projects.store') }}">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Titolo</label>
        <input
            type="text"
            class="form-control @error('name') is-invalid @enderror"
            id="name"
            name="name"
            value="{{ old('name') }}"
        >
        <div class="invalid-feedback">
            @error('nome') {{ $message }} @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="url_image" class="form-label">Link immagine</label>
        <input
            type="text"
            class="form-control @error('url_image') is-invalid @enderror"
            id="url_image"
            name="url_image"
            value="{{ old('url_image') }}"
        >
        <div class="invalid-feedback">
            @error('url_image') {{ $message }} @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="link" class="form-label">Link</label>
        <input
            type="text"
            class="form-control @error('link') is-invalid @enderror"
            id="link"
            name="link"
            value="{{ old('link') }}"
        >
        <div class="invalid-feedback">
            @error('link') {{ $message }} @enderror
        </div>
    </div>
    <div class="mb-3">
        <label for="link_github" class="form-label">Link Git Hub</label>
        <input
            type="text"
            class="form-control @error('link_github') is-invalid @enderror"
            id="link_github"
            name="link_github"
            value="{{ old('link_github') }}"
        >
        <div class="invalid-feedback">
            @error('link_github') {{ $message }} @enderror
        </div>
    </div>
    <div class="mb-3">
        <label for="url_gif" class="form-label">Link Gif</label>
        <input
            type="text"
            class="form-control @error('url_gif') is-invalid @enderror"
            id="url_gif"
            name="url_gif"
            value="{{ old('url_gif') }}"
        >
        <div class="invalid-feedback">
            @error('url_gif') {{ $message }} @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea
            class="form-control @error('description') is-invalid @enderror"
            id="description"
            rows="3"
            name="description">{{ old('description') }}</textarea>
        <div class="invalid-feedback">
            @error('description') {{ $message }} @enderror
        </div>
    </div>

    <button class="btn btn-primary">Salva</button>
</form>

@endsection