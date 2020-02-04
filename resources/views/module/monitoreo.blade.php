<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF Token -->
    <title>
        @yield('title', config('app.name', 'Laravel'))
    </title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-better-nav/css/bootstrap-better-nav.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome/css/fontawesome.min.css') }}">
    @stack('links')
</head>
<body>
    <div id="app">
        @include('layouts.includes.navbar')

        <main class="@yield('mainTagClass', 'container pt-4 pb-5 mb-5')">
            @yield('content')
            @section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('roles.index'), 'text'=>'Monitoreo', 'active'=>true]
		]
	])
	@endcomponent
        </main>
        @section('footer')
            @include('layouts.includes.footer')
        @show
        @yield('modals')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap-better-nav/js/bootstrap-better-nav.min.js') }}"></script>
    @stack('scripts')
    <div class ="container">  
<div class="container">
        <a class="btn" href="">Recargar página</a>
    </div>
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-hover">
            <caption>Lista de parcelas</caption>
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Humedad</th>
                    <th>Temperatura</th>
                    <th>Sensor</th>
                    <th>Estado</th>
                    <th>Última actualización</th>
                    
                </tr>
                <tr>
                    <td>1</td>
                    <td>76%</td>
                    <td>25c°</td>
                    <td>1</td>
                    <td>Activo</td>
                    <td>2019-12-12 23:17:24</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>75%</td>
                    <td>24c°</td>
                    <td>1</td>
                    <td>Activo</td>
                    <td>2019-12-12 23:23:24</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>76%</td>
                    <td>25c°</td>
                    <td>1</td>
                    <td>Activo</td>
                    <td>2019-12-27 23:17:24</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>78%</td>
                    <td>23c°</td>
                    <td>1</td>
                    <td>Activo</td>
                    <td>2019-12-27 23:27:14</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>76%</td>
                    <td>25c°</td>
                    <td>1</td>
                    <td>Activo</td>
                    <td>2019-12-27 23:37:24</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>74%</td>
                    <td>25c°</td>
                    <td>1</td>
                    <td>Activo</td>
                    <td>2019-12-27 23:47:24</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>78%</td>
                    <td>23c°</td>
                    <td>1</td>
                    <td>Activo</td>
                    <td>2019-12-27 23:57:24</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>70%</td>
                    <td>28c°</td>
                    <td>1</td>
                    <td>Activo</td>
                    <td>2019-12-28 00:07:24</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>73%</td>
                    <td>20c°</td>
                    <td>1</td>
                    <td>Activo</td>
                    <td>2019-12-28 14:34:12</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>72%</td>
                    <td>25c°</td>
                    <td>1</td>
                    <td>Activo</td>
                    <td>2019-12-28 14:44:34</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>65%</td>
                    <td>22c°</td>
                    <td>1</td>
                    <td>Activo</td>
                    <td>2020-01-03 15:30:24</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>60%</td>
                    <td>25c°</td>
                    <td>1</td>
                    <td>Activo</td>
                    <td>2020-01-03 15:50:24</td>
                </tr> 
                  
                <tr>
                    <td>13</td>
                    <td>60%</td>
                    <td>25c°</td>
                    <td>1</td>
                    <td>Activo</td>
                    <td>2020-01-03 16:00:24</td>
                </tr> 

                <tr>
                    <td>14</td>
                    <td>60%</td>
                    <td>25c°</td>
                    <td>1</td>
                    <td>Activo</td>
                    <td>2020-01-03 16:10:24</td>
                </tr> 

                 <tr>
                    <td>15</td>
                    <td>65%</td>
                    <td>26c°</td>
                    <td>1</td>
                    <td>Activo</td>
                    <td>2020-01-03 16:20:23</td>
                </tr> 

                 <tr>
                    <td>16</td>
                    <td>67%</td>
                    <td>25c°</td>
                    <td>1</td>
                    <td>Activo</td>
                    <td>2020-01-03 16:30:22</td>
                </tr> 

                 <tr>
                    <td>17</td>
                    <td>68%</td>
                    <td>24c°</td>
                    <td>1</td>
                    <td>Activo</td>
                    <td>2020-01-03 16:40:22</td>
                </tr> 

            </thead>
            
                    <tr>
                        <td colspan="7">Recarge para obtener datos actuales</td>
                    </tr>
                
            </tbody>
        </table>
         </div>
    </div>
 <div class="container" style="width: 80rem;">
 	<div class="row">
  <div class="col">
     <canvas id="Temperatura" width="100" height="100"></canvas>
 </div>
 	<div class="col">
 		<canvas id="humedad" width="40" height="40"></canvas>

 	</div>
 	<div class="col">
 		<canvas id="humedadsuelo" width="40" height="40"></canvas>

 	</div>
 </div>
</div>
</body>


<script>
        var ctx= document.getElementById("Temperatura").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"line",
            data:{
                labels:['12:00','12:30','13:00','13:50'],
                datasets:[{
                        label:'Temperatura',
                        data:[35,34,33.38],
                        backgroundColor:[
                            'rgb(66, 134, 244,0.5)',
                            'rgb(74, 135, 72,0.5)',
                            'rgb(229, 89, 50,0.5)'
                        ],

                }]
            },
            options:{

                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                    }]
                }
            }
        });
    </script>

<script>
        var ctx= document.getElementById("humedad").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"line",
            data:{
                labels:['12:00','12:30','13:00','13:50'],
                datasets:[{
                        label:'humedad ambiente',
                        data:[74,45,41.35],
                        backgroundColor:[
                            'rgb(66, 134, 244,0.5)',
                            'rgb(74, 135, 72,0.5)',
                            'rgb(229, 89, 50,0.5)'
                        ],

                }]
            },
            options:{

                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                    }]
                }
            }
        });
    </script>
<script>
        var ctx= document.getElementById("humedadsuelo").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"line",
            data:{
                labels:['12:00','12:30','13:00','13:50'],
                datasets:[{
                        label:'Humedad del suelo',
                        data:[15,80,75.45],
                        backgroundColor:[
                            'rgb(66, 134, 244,0.5)',
                            'rgb(74, 135, 72,0.5)',
                            'rgb(229, 89, 50,0.5)'
                        ],

                }]
            },
            options:{

                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                    }]
                }
            }
        });
    </script>

</html>
</html>