@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Modifica: {{ $post->title }}</h1>
    <a class="btn btn-primary" href="{{route('admin.posts.show', $post)}}">SHOW</a>
  </div>
  <div>
    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
      @csrf
      @method('PATCH')

      <div class="container">
        <div class="mb-3">
          <label class="label-control" for="title">Titolo</label>
          <input class="form-control" type="text" id="title" name="title" value="{{ $post->title }}">
        </div>

        <div class="mb-3">
          <label class="label-control" for="content">Titolo</label>
          <textarea class="form-control" type="text" id="content" name="content" rows="5" >{{ $post->content }}
          </textarea>
        </div>

        <div class="mb-3">
          <label class="label-control" for="category_id">Categoria</label>
          <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
              <option value="">Seleziona una categoria</option>
              @foreach ($categories as $category)
                <option 
                @if (old('category_id', $post->category_id) == $category->id)
                  selected                  
                @endif
                value="{{ $category->id }}" >{{ $category->name }}</option>
              @endforeach
          </select>
          @error('category_id')
             <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <button class="btn btn-primary" type="submit" >SEND</button>
        </div>
      </div>

    </form>  
  </div>  
@endsection