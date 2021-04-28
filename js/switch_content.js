$(document).ready(function(){
    if(error){
        $(".box-logo").toggle();
        $(".box-co").toggle();
    }
    $(".connexion").click(function(){
        if ($(`.box-logo`).is(":hidden")){
            $(".box-co").toggle();
            $(".box-about").hide();
            $(".box-contact").hide();
            if ($('.box-co').is(":hidden")) {
                $(".box-logo").toggle();
            }
        }
        else {
            $(".box-logo").toggle();
            $(".box-co").toggle();
        }
    });
    $(".about").click(function(){
        if ($(`.box-logo`).is(":hidden")){
            $(".box-about").toggle();
            $(".box-co").hide();
            $(".box-contact").hide();
            if ($(`.box-about`).is(":hidden")) {
                $(".box-logo").toggle();
            }
        }
        else {
            $(".box-logo").toggle();
            $(".box-about").toggle();
        }
    });
    $(".contact").click(function(){
        if ($(`.box-logo`).is(":hidden")){
            $(".box-contact").toggle();
            $(".box-about").hide();
            $(".box-co").hide();
            if ($(`.box-contact`).is(":hidden")) {
                $(".box-logo").toggle();
            }
        }
        else {
            $(".box-logo").toggle();
            $(".box-contact").toggle();
        }
    });
});