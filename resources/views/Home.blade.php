@extends('layouts.main')

@section('content')



<div class="row">
    <div class="col-md-8">
    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
            {{ $error }}
          </div>
      @endforeach    
    @endif
        <form method="POST" action="{{ route('submit-form') }}" enctype="multipart/form-data" id="qForm">

          @csrf

        <h4 class="mb-3">1. Koks jūsų vardas?</h4>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Jūsų vardas" name="yname" id="name" required>
        </div>

        <h4 class="mb-3">2. Jūsų gimimo data:</h4>
        <div class="form-row">
        
          <div class="form-group col-md-4">
          
            <label for="inputCity">Metai</label>
            <select id="years" class="form-control" name="birthYears" required>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">Mėnesis</label>
            <select id="months" class="form-control" name="birthMonth" required>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="inputZip">Diena</label>
            <select id="days" class="form-control" name="birthDays" required>
            </select>
          </div>
        </div>

        <h4 class="mb-3">3. Lytis:</h4>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="Vyras" required>
            <label class="form-check-label" for="exampleRadios1">
              Vyras
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="Moteris" required>
            <label class="form-check-label" for="exampleRadios1">
              Moteris
            </label>
          </div>
        </div>

        <h4 class="mb-3">4. Ar domitės programavimu?</h4>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="intProgramming" value="Taip" checked required>
            <label class="form-check-label" for="exampleRadios1">
              Taip
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="intProgramming" value="Ne" required>
            <label class="form-check-label" for="exampleRadios1">
              Ne
            </label>
          </div>
        </div>


        <h4 class="mb-3">5. Kokias programavimo kalbas mokate?</h4>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="langs[]" id="lang-y" value="PHP">
            <label class="form-check-label" for="exampleRadios1">
              PHP
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="langs[]" id="lang-y" value="CSS">
            <label class="form-check-label" for="exampleRadios1">
              CSS
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="langs[]" id="lang-y" value="HTML">
            <label class="form-check-label" for="exampleRadios1">
            HTML
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="langs[]" id="lang-y" value="JavaScript">
            <label class="form-check-label" for="exampleRadios1">
            JavaScript
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="langs[]" id="lang-y" value="Java">
            <label class="form-check-label" for="exampleRadios1">
            Java
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="langs[]" id="lang-no" value="Nemoku nė vienos">
            <label class="form-check-label" for="exampleRadios1">
            Nemoku nė vienos 
            </label>
          </div>
          
        </div>

          <h4 class="mb-3">6. Prašome patalpinti savo nuotrauką:</h4>
          <div class="form-group">
            <input type="file" class="form-control-file" name="foto">
          </div>

            <button type="submit" id="finish" class="btn btn-primary">Siųsti</button>
        </form>
    </div>
</div>


@endsection