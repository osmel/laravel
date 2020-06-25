    jQuery(document).ready(function($) {    
        //$('#tabla').DataTable();

        jQuery('#tabla').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "/api/midatatable", //"scripts/server_processing.php"

            "pageLength": 5, //numeros de filas por paginas

    "language": {  //tratamiento de lenguaje
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No hay registros",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Mostrando _TOTAL_ de _MAX_ registros totales)",  
            "emptyTable":     "No hay registros",
            "infoPostFix":    "",
            "thousands":      ",",
            "loadingRecords": "Leyendo...",
            "processing":     "Procesando...",
            "search":         "Buscar:",
            "paginate": {
                "first":      "Primero",
                "last":       "Último",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending":  ": Activando para ordenar columnas ascendentes",
                "sortDescending": ": Activando para ordenar columnas descendentes"
            },
        },
       
       "columnDefs": [
                    
                    { 
                        "render": function ( data, type, row ) {
                                return row.id;
                        },
                        "targets": [0] 
                    },


                    { 
                        "render": function ( data, type, row ) {
                                return row.name;
                        },
                        "targets": [1] 
                    },

                    { 
                        "render": function ( data, type, row ) {
                                return row.email;
                        },
                        "targets": [2] 
                    },

                    {
                        "render": function ( data, type, row ) {
                        texto='<td>';
                            texto+='<a href="/usuarios/'+row.id+'/editar" type="button"';
                            texto+=' class="btn btn-warning btn-sm btn-block" >';
                                texto+=' <span class="oi oi-pencil">Editar</span>';
                            texto+=' </a>';
                        texto+='</td>';

                            return texto;   
                        },
                        "targets": 3
                    },


                    {
                        "render": function ( data, type, row ) {
                        texto='<td>';
                            texto+='<a href="/eliminar_usuario/'+row.id+'" type="button"';
                            texto+=' class="btn btn-danger btn-sm btn-block" >';
                                texto+=' <span class="oi oi-pencil">Eliminar</span>';
                            texto+=' </a>';
                        texto+='</td>';

                            return texto;   
                        },
                        "targets": 4
                    },



        ],            
        /*
       "columns":[
          {data:'id'},
          {data:'name'},
          {data:'email'},
          {data:'updated_at'},
        ],

    */


        } );

} );

