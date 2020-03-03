// create a date object for the current date
var today = new Date();
var dd = today.getDate(); //day
var mm = today.getMonth()+1; // January is 0 // month
var yyyy = today.getFullYear(); // year
	if(dd<10){
		dd = '0'+dd;
	}
	if(mm<10){
		mm = '0'+mm;
	}
today = yyyy+'-'+mm+'-'+dd;
document.getElementById('sDate').setAttribute('max',today);
document.getElementById('eDate').setAttribute('max',today);


var btn1 = document.getElementById('click1');
btn1.addEventListener('click', runIncomeEvent);

var btn2 = document.getElementById('click2');
btn2.addEventListener('click', runExpenditureEvent);

var btn3 = document.getElementById('submit');
btn3.addEventListener('submit', runSubmitEvent);

function runIncomeEvent(e) {
    e.preventDefault();
    document.getElementById('income').style.display = "block";
    document.getElementById('expenditure').style.display = "none";
}

function runExpenditureEvent(e){
	e.preventDefault();
	document.getElementById('income').style.display = "none";
	document.getElementById('expenditure').style.display = "block";
}

function runSubmitEvent(){
	//e.preventDefault();
	//validate the date input to make sure the start date is less than the end date
	var start_date = document.getElementById('sDate').value;
	var end_date = document.getElementById('eDate').value;
	document.getElementById('show').style.display = "block";
	document.getElementById('sd').innerHTML = 'Start Date: '+start_date;
	document.getElementById('ed').innerHTML = 'End Date: '+end_date;

            //<?php $account->statement_facts(start_date,end_date);?>;

}