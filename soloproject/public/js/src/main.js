$(function(){


	/************************************************************
	*************************************************************
	Assists Nav Bars movement in and out of page by adding and 
	removing the class of "show"
	*************************************************************
	*************************************************************/

	$('.show-menu').on("click", function (event) {
		event.preventDefault();
		$('.primary-menu').toggleClass("show");

	});

	/************************************************************
	*************************************************************
	Brings in Knob.js to fancify the input fields
	*************************************************************
	*************************************************************/
	  
	$(".knob").knob();


	/************************************************************
	*************************************************************
	Converts my tables into charts through 
	jquery High Chart table plugin and it's themes
	*************************************************************
	*************************************************************/
	$('table.highchart').bind('highchartTable.beforeRender', 
		function(event, highChartConfig) {
    		highChartConfig.colors = ['#22ffee', '#20FF1A'];
  		}).highchartTable();

});