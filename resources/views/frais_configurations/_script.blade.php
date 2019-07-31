<script>
	

	$( document ).ready(function() {


        $('#school').on('change', function(e){
            var school_id = e.target.value;

            console.log(school_id);
            if(school_id) {
                $.get('/api/get/'+ school_id , function(data) {
                    //console.log(client_id)
                    if(data) {
                        //var response = JSON.parse(data);
                        console.log(data)
                        $('#annee-form-group').show();
                         $('#frais-form-group').show();
                        $('#classe-form-group').show();
                        $('#echeance-form-group').show();

                        $('#annee').empty();
                        $('#frais').empty();
                        $('#classe').empty();                        
                        $('#echeance').empty(); 

                        $('#annee').append('<option value="">---</option>');
                        $('#frais').append('<option value="">---</option>');
                        $('#classe').append('<option value="{{ old('classe_id') }}">---</option>');                        
                        $('#echeance').append('<option value="{{ old('echeance_id') }}">---</option>')
                   
                   // alert(response.nom)
                        $.each(data, function(index, value){
                             for(var j in value.annees){
                            $('#annee').append('<option value="' + value.annees[j].id + '">' + value.annees[j].session_name +'</option>');
                            }
                            for(var i in value.frais){ 
                            $('#frais').append('<option value="' + value.frais[i].id + '">' + value.frais[i].nom +'</option>');
                            }
                            for(var j in value.echeances){
                            $('#echeance').append('<option value="' + value.echeances[j].id + '">' + value.echeances[j].nom +'</option>');
                            }
                            for(var j in value.classes){
                            $('#classe').append('<option value="' + value.classes[j].id + '">' + value.classes[j].nom_classe +'</option>');
                            } 
                        });

                    } else {
                        $('#annee').empty();
                        $('#annee').append('<option value="{{ old('annee_id') }}">---</option>');

                        $('#classe').empty();
                        $('#classe').append('<option value="{{ old('classe_id') }}">---</option>');

                        $('#echeance').empty();
                        $('#echeance').append('<option value="{{ old('echeance_id') }}">---</option>');

                        $('#frais').empty();
                        $('#frais').append('<option value="">---</option>');
                    }
                });


                 


            } else {
                $('#annee').empty();
                $('#annee').append('<option value="">---</option>');
                $('#classe').empty();
                $('#classe').append('<option value=" ">---</option>');

                $('#echeance').empty();
                $('#echeance').append('<option value=" ">---</option>');

                $('#frais').empty();
                $('#frais').append('<option value="">---</option>');


            }



        });

});

</script>