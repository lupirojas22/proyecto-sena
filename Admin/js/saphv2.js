$(document).ready(function() {
  $(window).load(function() {


      // Login Efect
      $(".account-wall").fadeIn(1000);
      // Friendly Reques Efect
      $(".card").addClass("animated zoomIn").fadeIn(1000);
      // Porcent Cubes Efect
      $(".porcent-cubes").addClass("animated flipInX").fadeIn(1000);
      // users Efect
      $(".user-panel").addClass("animated flipInY").fadeIn(1000);

    });
});


/// Menu Efects
$(document).ready(function(){


// Menu Links
$("#sider-menu a").hover(
  function() {
    $(this).find("i").addClass("animated rubberBand");
  }, function() {
    $(this).find("i").removeClass("animated rubberBand");
  }
);


// Porcent Cubes
$(".porcent-cubes .col-md-3").hover(
  function() {
    $(this).addClass("animated bounce");
  }, function() {
    $(this).removeClass("animated bounce");
  }
);

// Chart.js
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
	var barChartData = {
		labels : ["January","February","March","April","May","June","July"],
		datasets : [
			{
				fillColor : "rgba(184,19,39,0.5)",
				strokeColor : "rgba(184,19,39,0.8)",
				highlightFill: "rgba(184,19,39,0.75)",
				highlightStroke: "rgba(184,19,39,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			},
			{
				fillColor : "rgba(0,185,30,0.5)",
				strokeColor : "rgba(0,185,30,0.8)",
				highlightFill : "rgba(0,185,30,0.75)",
				highlightStroke : "rgba(0,185,30,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			},
			{
				fillColor : "rgba(31,161,229,0.5)",
				strokeColor : "rgba(31,161,229,0.8)",
				highlightFill : "rgba(31,161,229,0.75)",
				highlightStroke : "rgba(31,161,229,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			}			
		]

	}
	window.onload = function(){
		var ctx = document.getElementById("barchart").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : true
		});
	}

/* Side Menu Display */
$(".showmenu").on("click", function(event) {
  event.preventDefault();

    if ($(this).hasClass("fa-angle-down")){
         $(this).removeClass("fa-angle-down");
         $(this).addClass("fa-angle-up");
         $("#sider-menu").fadeIn();

    }else{

        $(this).removeClass("fa-angle-up");
        $(this).addClass("fa-angle-down");
        $("#sider-menu").fadeOut();
  
    }

});



/* Users Delete Button */
$(".del-user").on("click", function(event) {
  event.preventDefault();

    var Parent = $(this).parent();
    Parent.removeClass("animated flipInY");
    Parent.addClass("animated zoomOutUp");
    Parent.toggle(2000);

});

/* Chsrt Area */
		var doughnutData = [
				{
					value: 300,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Red"
				},
				{
					value: 50,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Green"
				},
				{
					value: 100,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Yellow"
				},
				{
					value: 40,
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Grey"
				},
				{
					value: 120,
					color: "#4D5360",
					highlight: "#616774",
					label: "Dark Grey"
				}

			];

				var chartarea = document.getElementById("chart-area").getContext("2d");
				window.myDoughnut = new Chart(chartarea).Doughnut(doughnutData, {responsive : true});



/* Line */
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		var lineChartData = {
			labels : ["January","February","March","April","May","June","July"],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				},
				{
					label: "My Second dataset",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				}
			]

		}

		var linechartarea = document.getElementById("line").getContext("2d");
		window.myLine = new Chart(linechartarea).Line(lineChartData, {
			responsive: true
		});

/* Pie Chart */
		var pieData = [
				{
					value: 300,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Red"
				},
				{
					value: 50,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Green"
				},
				{
					value: 100,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Yellow"
				},
				{
					value: 40,
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Grey"
				},
				{
					value: 120,
					color: "#4D5360",
					highlight: "#616774",
					label: "Dark Grey"
				}

			];

				var piearea = document.getElementById("pie").getContext("2d");
				window.myPie = new Chart(piearea).Pie(pieData);

/* Radar Area */
	var radarChartData = {
		labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
		datasets: [
			{
				label: "My First dataset",
				fillColor: "rgba(220,220,220,0.2)",
				strokeColor: "rgba(220,220,220,1)",
				pointColor: "rgba(220,220,220,1)",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "rgba(220,220,220,1)",
				data: [65,59,90,81,56,55,40]
			},
			{
				label: "My Second dataset",
				fillColor: "rgba(151,187,205,0.2)",
				strokeColor: "rgba(151,187,205,1)",
				pointColor: "rgba(151,187,205,1)",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "rgba(151,187,205,1)",
				data: [28,48,40,19,96,27,100]
			}
		]
	};

		window.myRadar = new Chart(document.getElementById("radar").getContext("2d")).Radar(radarChartData, {
			responsive: true
		});

});