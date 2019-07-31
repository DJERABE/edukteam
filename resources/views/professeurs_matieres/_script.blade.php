<script>
	

	$( document ).ready(function() {


        $('#school').on('change', function(e){
            var school_id = e.target.value;

            console.log(school_id);
            if(school_id) {
                $.get('/api/getAnneeAcademiques/' + school_id , function(data) {
                    //console.log(client_id)
                    if(data) {
                        //console.log(data)
                        $('#annee-form-group').show();
                        $('#annee').empty();
                        $('#annee').append('<option value="">---</option>');
                        $.each(data, function(index, annee){
                            $('#annee').append('<option value="' + annee.id + '">' + annee.session_name +'</option>');
                        });
                    } else {
                        $('#annee').empty();
                        $('#annee').append('<option value="" >---</option>');
                    }
                });


                 $.get('/api/getProfesseurs/' + school_id , function(dat) {
                    //console.log(client_id)
                    if(dat) {
                        //console.log(data)
                        $('#professeur-form-group').show();
                        $('#professeur').empty();
                        $('#professeur').append('<option value="">---</option>');
                        $.each(dat, function(index, professeur){
                            $('#professeur').append('<option value="' + professeur.id + '">' + professeur.nom +    professeur.prenoms+'</option>');
                        });
                    } else {
                        $('#professeur').empty();
                        $('#professeur').append('<option value="">---</option>');
                    }
                });




            } else {
                $('#annee').empty();
                $('#annee').append('<option value="">---</option>');

                $('#professeur').empty();
                $('#professeur').append('<option value="">---</option>');


            }



        });

 
// $('#professeur').on('change', function(e){
//     var school_id =document.getElementById("school").value; 
//             var professeur_id = e.target.value;


//             console.log(professeur_id+'school_id='+school_id);
//             if(professeur_id) {
//                 $.get('/api/getMatieresProfesseur/'+professeur_id  , function(data) {
//                     //console.log(client_id)
//                     if(data) {
//                         //console.log(data)
//                         $('#myTable').empty();


//                         for(var x in data){

//                             //alert(data[x].nom_matiere);

//                             $('#myTable').append(

//                                 "<tr>"+

//                                    "<td>"+data[x].nom_matiere+"</td>"+
//                                    "<td>"+"term"+ "</td>"+
//                                    "<td>"+"classe"+ "</td>"+
//                                    "<td>"+"periode"+ "</td>"+
//                                    "<td>"+"<form method='POST' accept-charset='UTF-8' style='display: inline'onSubmit='return confirm(&quot;Êtes-vous sur de vouloir supprimer cet element ?&quot;)'>"  +

//                                    "<a class='btn btn-info btn-sm'>"+
//                                    "<i class='fa fa-eye'>"+
//                                    "</i>"+
//                                    "</a>"+
    
//              "<a class='btn btn-warning btn-sm'>"+
//                                    "<i class='fa fa-eye'>"+
//                                    "</i>"+
//                                    "</a>"+
    
//             "<button type='submit' class='btn btn-danger btn-sm'>"+
//             "<i class='fa fa-trash'>"+
//             "</i>"+
//             "</button>"+

//                                    "</form>"+



//                                    + "</td>"+

//                                    "</tr>"
//                                 );
//                         }
                       
//                         $('#anenee').append('<option value="">---</option>');
//                         $.each(data, function(index, annee){
//                             $('#aneenee').append('<option value="' + annee.id + '">' + annee.session_name +'</option>');
//                         });
//                     } else {
//                         $('#anenee').empty();
//                         $('#anneee').append('<option value="">---</option>');
//                     }
//                 });

//             };

//     });

});

</script>