$(document).ready(function(){
    $("#TexteAAfficher").hide();
    // on ajoute le texte cliquable et on y met un attribut pour savoir si on est masqué ou affiché
    $("#ZoneDeClic").html("<p>Cliquer pour faire apparaitre le texte</p>")
    .attr("statut","1")
    .click(function(){
        $("#TexteAAfficher").slideToggle("slow");
        if ($("#ZoneDeClic").attr("statut")="1"){
            $("#ZoneDeClic").html("<p>Cliquer pour faire disparaitre le texte</p>").attr("statut","0");
        }
        else{
            $("#ZoneDeClic").html("<p>Cliquer pour faire apparaitre le texte</p>").attr("statut","1");
        };
    });
});