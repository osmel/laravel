    jQuery(document).ready(function($) {    
        //$('#tabla').DataTable();

        idioma= (jQuery('.idioma').attr('idioma')!='') ? jQuery('.idioma').attr('idioma') : "es";

        jQuery.ajax({
                url : '/idioma',
                data:{
                     //"_token": "{{ csrf_token() }}",
                    idioma:idioma
                },
                //esta clausula es obligatoria en laravel
                headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},

                type : 'POST',
                dataType : 'json',
                success : function(data) {
                    alert(  JSON.stringify(JSON.parse(data)) );
                },
                error : function(jqXHR, status, error) {
                    //
                },
                complete : function(jqXHR, status) {
                    
                }
        }); 


        

        jQuery('#tabla').DataTable( {
              "processing": true,
              "serverSide": true,
              "ajax": "/api/midatatable", //"scripts/server_processing.php"

              "pageLength": 10, //numeros de filas por paginas

              "language": {  //tratamiento de lenguaje
                   "url": "/plugins/dataTables-1.10.21/Plugins/i18n/"+idioma+".lang",
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

