<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Prueba - Luis Marrufo</title>

        <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <!-- Select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <!-- Datatables -->
        <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css" rel="stylesheet" />
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/AdminLTE.css')}}">
    </head>

    <body>
        <div class="wrapper">

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <!-- Main content -->
                <section class="content">
                    <div class="box box-default color-palette-box">
                        <div class="box-header with-border">
                            <i id="titulo_icon" class="fa fa-crosshairs"></i>
                            <span class="terra-titulo">Precios de Carburantes - Postes Marítimos <span id="detalleBusqueda" class="red small">{{$provinciaActual->provincia ?? ''}} {{$municipioActual->nombre ?? ''}}</span></span>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <label class="col-xs-12 control-label" for="provincia">Provincia:</label>
                                    <div class="col-xs-12">
                                        <select class="form-control select2" id="provincia" name="provincia">
                                            <option value=" "></option>
                                            <?php
                                            $provincias = App\Provincia::all();
                                            foreach($provincias as $provincia)
                                            {
                                                echo '<option ';
                                                if(isset($provinciaActual->id_provincia) && $provincia->id_provincia == $provinciaActual->id_provincia)
                                                    echo 'selected ';
                                                echo 'value="'.$provincia->id_provincia.'">'.$provincia->provincia.'</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-3">
                                    <label class="col-xs-12 control-label" for="municipio">Municipio:</label>
                                    <div class="col-xs-12">
                                        <select class="form-control select2" id="municipio" name="municipio">
                                            <option value=" "></option>
                                            <?php
                                            if(isset($municipios))
                                            {
                                                foreach($municipios as $municipio)
                                                {
                                                    echo '<option ';
                                                    if(isset($municipioActual->id_municipio) && $municipio->id_municipio == $municipioActual->id_municipio)
                                                        echo 'selected ';
                                                    echo 'value="'.$municipio->id_municipio.'">'.$municipio->nombre.'</option>';
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-3">
                                    <label class="col-xs-12 control-label" for="orden">Ordenamiento:</label>
                                    <div class="col-xs-12">
                                        <select class="form-control select2" id="orden" name="orden">
                                            <option value=" "></option>
                                            <option value="asc">Precio más bajo</option>
                                            <option value="desc">Precio más alto</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-3">
                                    <label class="col-xs-12 control-label" for="agregar">&nbsp;</label>
                                    <div class="col-xs-12">
                                        <button id="btnAgregar" style="width:100%;vertical-align:baseline;" class="btn btn-terra btn-flat" type="button">Consultar</button>
                                    </div>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.box-body -->
                        
                        <hr>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <style>
                                        #map {
                                            height: 400px;  /* The height is 400 pixels */
                                            width: 100%;  /* The width is the width of the web page */
                                        }
                                    </style>
                                    <div id="map"></div>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.box-body -->

                        <!-- Post -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="post table-responsive">
                                        <table id="gasolineras" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Provincia</th>
                                                    <th>Municipio</th>
                                                    <th>Precio Gasóleo A</th>
                                                    <th>Dirección</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Provincia</th>
                                                    <th>Municipio</th>
                                                    <th>Precio Gasóleo A</th>
                                                    <th>Dirección</th>
                                                </tr>
                                            </tfoot>
                                            <tbody></tbody>
                                        </table>	
                                    </div><!-- /.post -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!--/box-body-->

                    </div><!-- /.box -->
                </section><!-- /.content -->
          
                <p id="author">Desarrollado por <a href="mailto:luiz.marrufo@gmail.com" target="_blank">Luis Marrufo Torres.</a></p>
                
            </div><!-- /.content-wrapper -->
            
        </div><!-- ./wrapper -->
        
        <!-- jQuery 1.11.3 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <!-- Select2 -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <!-- DataTables -->
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.datatables.net/colreorder/1.5.2/js/dataTables.colReorder.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js"></script>
        
        <script>
            //Initialize Select2 Elements
            $(".select2").select2();

            //ARRANCAR MAPA
            function initMap(locations = '')
            {
                //EL MAPA CENTRADO EN ESPAÑA
                var map = new google.maps.Map(
                    document.getElementById('map'), {zoom: 5, center: new google.maps.LatLng(40.1415672, -4.1902276)});
                 
                //create empty LatLngBounds object
                var bounds = new google.maps.LatLngBounds();
                var infowindow = new google.maps.InfoWindow();
                
                if(locations != '')
                {
                    for (i = 0; i < locations.length; i++)
                    {  
                        var marker = new google.maps.Marker({
                            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                            map: map
                        });

                        //extend the bounds to include each marker's position
                        bounds.extend(marker.position);

                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                infowindow.setContent(locations[i][0]);
                                infowindow.open(map, marker);
                            }
                        })(marker, i));
                    }
                    
                    //now fit the map to the newly inclusive bounds
                    map.fitBounds(bounds);

                    //(optional) restore the zoom level after the map is done scaling
                    var listener = google.maps.event.addListener(map, "idle", function () {
                        map.setZoom(8);
                        google.maps.event.removeListener(listener);
                    });
                }//SI SE ENCONTRÓ UNA LOCACIÓN
            }//INIT MAP GOOGLE
        </script>

        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCk63DNsDAD97ZCDyF8zRv968zE_toE_UA&callback=initMap">
        </script>

        <script>
            $(document).ready( function ()
            {
                $(function(){
                    var $eventSelect = $("#provincia");
                    $eventSelect.on("select2:select", function (e) { console.log("select2:select", e); });
                    $eventSelect.on("change", function () {
                        $("#municipio").empty();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "{{ url('/municipio/post') }}",
                            method: 'post',
                            data: {
                                id: $('#provincia').val()
                            },
                            success: function(result){
                                $("#municipio").select2({
                                    data: result
                                });
                            }
                        });
                    });
                });

                $("#btnAgregar").on("click", function ()
                {
                    var provincia = $.trim($("#provincia").val());
                    if(provincia == "") provincia = 0;
                    var municipio = $.trim($("#municipio").val());
                    if(municipio == "") municipio = 0;
                    var orden = $.trim($("#orden").val());
                    if(orden == "") orden = 0;
                    $(this).html('Cargando...');
                    $.ajaxSetup({
                            headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('/post') }}",
                        method: 'post',
                        data: {
                            provincia: provincia,
                            municipio: municipio,
                            orden: orden
                        },
                        success: function(result)
                        {
                            console.log(result);
                            $("#detalleBusqueda").html(result.provincia + ' ' + result.municipio);
                            $("#btnAgregar").html('Consultar');
                            initTable(result.table);
                            var locations = [];
                            if(result.locations)
                            {
                                locationArray = result.locations.split("^");
                                $.each(locationArray, function(index, value){
                                    locationInfo = value.split("|");
                                    locations.push(locationInfo);
                                });
                            }
                            initMap(locations);
                        }
                    });
                });

                function initTable(dataset)
                {
                    //INICIALIZAR TABLE		
                    //DataTables
                    var table = $('#gasolineras').DataTable({
                        "destroy": true,
                        "paging": true,
                        "data": dataset,
                        "aaSorting": [],
                        "lengthChange": true,
                        "lengthMenu": [10,50,100],
                        "searching": true,
                        "fnDrawCallback": function() { },
                        "colReorder": true,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                        "pageLength": 15,
                        "language": {
                                "sProcessing":     "Procesando...",
                                "sLengthMenu":     "Mostrar _MENU_ registros",
                                "sZeroRecords":    "No se encontraron resultados",
                                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                                "sInfoPostFix":    "",
                                "sSearch":         "Buscar:",
                                "sUrl":            "",
                                "sInfoThousands":  ",",
                                "sLoadingRecords": "Cargando...",
                                "oPaginate": {
                                    "sFirst":    "Primero",
                                    "sLast":     "Último",
                                    "sNext":     "Siguiente",
                                    "sPrevious": "Anterior"
                                },
                                "oAria": {
                                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                                }
                            },
                            "dom": 'lBfrtip',
                            "buttons": [
                                'copyHtml5',
                                'csvHtml5'
                            ]
                        });
                        // Apply the search
                        table.columns().eq( 0 ).each( function ( colIdx ) {
                            $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
                                table
                                    .column( colIdx )
                                    .search( this.value )
                                    .draw();
                            } );
                        } );
                                    
                        $(".clear").hide();
                        $("#gasolineras_length").css({"display":"inline-block","margin-right":"15px"});
                }//INIT DE LA TABLA
            });
        </script>
    </body>
</html>