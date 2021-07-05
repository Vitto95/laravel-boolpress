@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Nuovo Post</h1>
  </div>

  {{-- Controllo per vedere se ci sono errori durante la creazione del nuovo post --}}
  {{-- any restiuisce un boolean --}}
  {{-- all restituisce un array contenente tutti gli errori. --}}
  @if ($errors->any())

  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)

        <li>{{ $error }}</li>
        
      @endforeach
    </ul>
  </div>
    
  @endif


  <div>
    <form action="{{ route('admin.posts.store') }}" method="POST">
      @csrf
      @method('POST')

      <div class="container">
        <div class="mb-3">
          <label class="label-control" for="title">Titolo</label>
          <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{ old('title') }}">
          @error('title')
            {{-- messaggio di errore se non inserito correttamente titolo --}}
            <div class="text-danger">{{ $message }}</div> 
          @enderror
        </div>

        <div class="mb-3">
          <label class="label-control" for="content">Titolo</label>
          <textarea class="form-control @error('title') is-invalid @enderror" type="text" id="content" name="content" rows="5" value="{{ old('content') }}">
          </textarea>
          @error('content')
            {{-- messaggio di errore se non inserito correttamente contenuto --}}
            <div class="text-danger">{{ $message }}</div>   
          @enderror
        </div>

        <div>
          <button class="btn btn-primary" type="submit" >SEND</button>
          <button class="btn btn-secondary" type="reset" >Reset</button>
        </div>
      </div>

    </form>  
  </div>  
@endsection