@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Nuovo Post</h1>
  </div>
  <div>
    <form action="{{ route('admin.posts.store') }}" method="POST">
      @csrf
      @method('POST')

      <div class="container">
        <div class="mb-3">
          <label class="label-control" for="title">Titolo</label>
          <input class="form-control" type="text" id="title" name="title">
        </div>

        <div class="mb-3">
          <label class="label-control" for="content">Titolo</label>
          <textarea class="form-control" type="text" id="content" name="content" rows="5" >
          </textarea>
        </div>

        <div>
          <button class="btn btn-primary" type="submit" >SEND</button>
          <button class="btn btn-secondary" type="reset" >Reset</button>
        </div>
      </div>

    </form>  
  </div>  
@endsection