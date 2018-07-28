@extends('ui::layouts.app')

@section('content')

    <h1 class="ui header">Current Environment  </h1>
   {{--  <h3 class="ui header">Environment Setting
    </h3> --}}

    <table class="ui celled striped table">
      <thead>
        <tr><th colspan="3">
          Git Repository
        </th>
      </tr>
      <tr>
      	<th >
          Key
        </th>
        <th >
          Value
        </th>
        <th >
          Active Value
        </th>
      </tr>
  	</thead>
      <tbody>
      	@foreach($current_envi as $envi)
        <tr class="{{$envi->name=='APP_NAME'||$envi->name=='DB_PORT' ||$envi->name=='DB_CONNECTION' ||$envi->name=='DB_USERNAME' ||$envi->name=='DB_PASSWORD' ? 'positive': 'negative'}}">
          <td class="collapsing">
            <i class="file alternate icon"></i> {{$envi->name}}
          </td>
          <td>{{$envi->value}}</td>
          <td class="right aligned collapsing">{{env($envi->name)}}</td>
        </tr>
        @endforeach
        
      </tbody>
    </table>


    
  

 
@stop
