Notes Jquery


// sélecteurs

$(document).ready(function() {
	$("h1").hide(); // ou "p", ".class", #nameid, "p:nth-child(2)" etc
});

// évènements

$(function() {
	$("#p1").click(function(){ // ex: mouseenter , mouseleave , 

		$('#p5').hide(); // ou show

	}); 
});

// le hover
$(function() {
	$("#p1").hover(function(){ 
		$('#p5').hide();
	},
	function(){
		$('#p5').show();
	}); 
});

// on

$(function() {
	$("#p1").on({
		mouseenter: function(){ 
		$('#p5').hide(); // peut avoir des éléments => ex: hide("slow")/"fast"//"1000"(1s)
	},
	mouseleave: function(){
		$('#p5').show();
	},
	click: function(){
	$('#p4').hide(); 
	}
	}); 
});



// callback

$(function(){

	$("#p1").click(function(){
		$('#p5').hide(1000, function(){

		$('#p3').hide(1000);	
		});
	});
});

// toggle => visible // invisible


$(function(){

	$("#p1").click(function(){
		$('#p5').toogle(); //  fadeOut => effet de flou. fadeIn => effet inverse. fadeToggle (ci dessus)
	});
});

// Animations

// <button> Launch Animations</button>
// <div style="width:100px; height:100px; background:red; position:absolute; top:50px; left:50px"></div>

$(function(){

	$("button").click(function(){
	$("div").animate({left: '600px', opacity: 0.2, width: "+=200px", height:'+=200px'}, 5000, function(){
	$('div').hide();
	});

	});
});

// lancer sur un seul élément : ex: $start (avec un button id="start")
// stop une anim => $("div").stop(trueORFalse, trueOrFalse);

// slideUp, slideDown

