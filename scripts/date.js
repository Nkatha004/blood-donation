var today = new Date();
var day = today.getDate();
var month = today.getMonth();
var year = today.getFullYear();

$(document).ready(function(){
    $('#date_of_birth').datepicker({
        changeMonth: true,
        changeYear: true,
        showOtherMonths:true,
        yearRange : '1950:c',
        maxDate: new Date(year,month,day)
    });
   
});

$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    $('#date_from').attr('min', maxDate);
    $('#date_to').attr('min', maxDate);
    $('#app_date').attr('min', maxDate);

});
