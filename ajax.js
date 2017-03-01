$(document).ready(function () {

	$(".change").on('change keyup', function (event) 
	{ //submit du formulaire de preview du meme

    	event.preventDefault();
			var texteHaut = $('#test').val();	
			var texteBas = $('#test1').val();	//les valeurs des input de formulare de modifications
			var colorHaut = $('#color').val();
			var colorBas = $('#color1').val();
			var tailleHaut = $('#tailleHaut').val();//les valeurs des input de formulare de modifications
			var tailleBas = $('#tailleBas').val();
			var rotationHaut = $('#rotation').val();//les valeurs des input de formulare de modifications
			var rotationBas = $('#rotation1').val();
			var leftPhraseHaut = $('#left').val();//les valeurs des input de formulare de modifications
			var topPhraseHaut = $('#top').val();
			var leftPhraseBas = $('#left1').val();//les valeurs des input de formulare de modifications
			var topPhraseBas = $('#top1').val();

			if(texteHaut !== "" || texteBas !== "")
			{
				$.post('affMeme.php',{  'topPhraseBas':topPhraseBas,
										'leftPhraseBas':leftPhraseBas, //ces valeurs envoyées en ajax
										'topPhraseHaut':topPhraseHaut, 
										'leftPhraseHaut':leftPhraseHaut, //ces valeurs envoyées en ajax
										'rotationBas':rotationBas, 
										'rotationHaut':rotationHaut,//ces valeurs envoyées en ajax
										'tailleBas':tailleBas,
										'tailleHaut':tailleHaut,//ces valeurs envoyées en ajax
										'texteHaut':texteHaut,
										'texteBas':texteBas,//ces valeurs envoyées en ajax
										'colorHaut':colorHaut,
										'colorBas':colorBas},function(data) {
											$('#image').attr('src', 'data:image/jpeg;base64,'+ data); //affichage de la preview
										});
			}
			else
			{
				$('#recupAjax').text('Veuillez saisir une blague');
			}
    });

    $("#submit1").on('click', function (e) 
    { //submit du formulaire qui enregistre le meme avec les modifications

        	e.preventDefault();
            var texteHaut = $('#test').val();//valeur des input des modifs 
			var texteBas = $('#test1').val();
			var colorHaut = $('#color').val();//valeur des input des modifs 
			var colorBas = $('#color1').val();
			var auteur = $('#auteur').val();//valeur des input des modifs 
			var nomMeme = $('#nomMeme').val();//valeur des input des modifs 
			var tailleHaut = $('#tailleHaut').val();
			var tailleBas = $('#tailleBas').val();//valeur des input des modifs 
			var rotationHaut = $('#rotation').val();
			var rotationBas = $('#rotation1').val();//valeur des input des modifs 
			var leftPhraseHaut = $('#left').val();
			var topPhraseHaut = $('#top').val();//valeur des input des modifs 
			var leftPhraseBas = $('#left1').val();
			var topPhraseBas = $('#top1').val();
			var submit = $('#submit1').val();
				
				$.post('enrMeme.php',{  'auteur':auteur, //ces ces valeur envoyés pour enregistrement du meme qui se fait dans la page php
										'nomMeme':nomMeme, 
										'topPhraseBas':topPhraseBas,//ces ces valeur envoyés pour enregistrement du meme qui se fait dans la page php
										'leftPhraseBas':leftPhraseBas, 
										'topPhraseHaut':topPhraseHaut, 
										'leftPhraseHaut':leftPhraseHaut, 
										'rotationBas':rotationBas, //ces ces valeur envoyés pour enregistrement du meme qui se fait dans la page php
										'rotationHaut':rotationHaut,
										'tailleBas':tailleBas,//ces ces valeur envoyés pour enregistrement du meme qui se fait dans la page php
										'tailleHaut':tailleHaut,
										'texteHaut':texteHaut,//ces ces valeur envoyés pour enregistrement du meme qui se fait dans la page php
										'texteBas':texteBas,
										'colorHaut':colorHaut,//ces ces valeur envoyés pour enregistrement du meme qui se fait dans la page php
										'colorBas':colorBas},function(data)
										{
											
										});
			
			$('#recupAjax2').html('<a style="width: 200px; height: 100px;" href="images/memeFini/'+ nomMeme +'.png" download>Télécharger votre meme</a>');
			
            });

$("#submit1").on('click', function (eve) 
    {
    	var champ1 = $('#auteur').val();
    	var cham2 = $('#nomMeme').val();
    	if(champ1 !== "" && champ2 !== "") {

    	} else {
    		eve.preventDefault();
    		alert('Remplissez les champs demandés');
    	}
    });
            
 });