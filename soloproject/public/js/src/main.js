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
	$('table.highchart')
  .bind('highchartTable.beforeRender', function(event, highChartConfig) {
    highChartConfig.colors = ['#104C4C', '#88CCCC'];
  })
  .highchartTable();


  /************************************************************
	*************************************************************
	Ajax Call to pull up Graph 
	*************************************************************
	*************************************************************/

	// $('form.check-in').on("submit", function(event){
	// 	event.preventDefault();

	// 	var send_data = {
	// 		plan_id: $('input.plan-id').val(),
	// 		caloric_intake: $('input.caloric-intake').val(),
	// 		caloric_output: $('input.caloric-output').val()
	//  	}

	//  	$.get('/insertCheckin', send_data, function(data){
	//  		console.log(data);
	//  		var newRow = '<tr><td>' + data.day + '</td><td>' + data.goal_pounds + '</td><td>' + data.actual_pounds + '</td></tr>';

	//  		$('tbody.body').append(newRow);
	//  	})

	// });


});