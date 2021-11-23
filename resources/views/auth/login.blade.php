@extends('layouts.app')


@section('content')



<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                
                    <form action="/login-usuario" method="POST"> 
                        <x-adminlte-input name="email" value="{{ old('email') }}"/>
                        <x-adminlte-input name="password" type="password" />
                       <div class="form-group row">
                           <div style="margin-left:15px;">
                                <div class="form-check">
                                
                                <input type="checkbox" class="form-check-input" 
                                    id="exampleCheck2" name="remember" >
                                <label class="form-check-label" for="exampleCheck2">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Lembre de mim</font>
                                </font>
                                </div>
                           </div>                     
                       </div>
                      
                        @csrf

                        <x-adminlte-button type="submit" label="Enviar" theme="dark"/>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('js')
    <script>
        //$('.input[type="checkbox"]').iCheck()
        console.log('js')
    </script>
@stop