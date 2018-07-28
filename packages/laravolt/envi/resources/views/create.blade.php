@extends('ui::layouts.app')

@section('content')

    <h1 class="ui header">Setup Environment Variable  </h1>
   {{--  <h3 class="ui header">Environment Setting
    </h3> --}}

     
      <div class="ui section divider"></div>
      <div class="column">
          {!!SemanticForm::open(['name'=>'form-envi','class'=>'ui form'])->route('envi::setup.store')!!}
          <h4 class="ui header">Environment Template </h4>
          @foreach($variables as $Variable)
          {!!SemanticForm::text($Variable, env($Variable))->label($Variable);!!}
        	@endforeach
          {!!SemanticForm::submit('Simpan')!!}
          </form>
      </div>
    
  

 
@stop
