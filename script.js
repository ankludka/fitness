//Select row
$("tbody tr").click(function () {
    $('.selected').removeClass('selected');
    $(this).addClass("selected");
  });

//Change day
//TODO last day zaciagany z BD
var day = 1;

$('#dayChange').click(function() {

  switch(day) {
      case 1:{
        $('#dayChange').html('Day B1');
        $('#day-a1').hide();
        $('#day-b1').show();
        day++;
      }
      break;
      case 2:{
        $('#dayChange').html('Day A2');
        $('#day-b1').hide();
        $('#day-a2').show();
        day++;
      }
      break;
      case 3:{
        $('#dayChange').html('Day B2');
        $('#day-a2').hide();
        $('#day-b2').show();
        day++;
      }
      break;
      case 4:{
        $('#dayChange').html('Day A1');
        $('#day-b2').hide();
        $('#day-a1').show();
        day = 1;
      }
      break;
      default : alert("qqqq");
  }
  
});

/*
function sendWeight(name, weight){
// TODO  exerciseArray = {'exercisename'}name, ['weight'][weight]};
// TODO  exerciseArray =  JSON.stringify(exerciseArray);
  $.ajax({
    data: 'asdf', //TODO
    url: 'codes.php',
    method: 'POST',
    success: function(data) {
      alert(data);
    }
});
}
*/

function changeWeight(weight, currentWeight){
  currentWeight = parseFloat(currentWeight);
  var newWeight = currentWeight+weight;
  $('.selected td:nth-of-type(3)').html(newWeight + "kg");  
}

$('#addOne').click(function(){
  var currentWeight = $('.selected td:nth-of-type(3)').html();
  changeWeight(1, currentWeight);
});
$('#addHalf').click(function(){
  var currentWeight = $('.selected td:nth-of-type(3)').html();
  changeWeight(0.5, currentWeight);
});
$('#subOne').click(function(){
  var currentWeight = $('.selected td:nth-of-type(3)').html();
  changeWeight(-1, currentWeight);
});
$('#subHalf').click(function(){
  var currentWeight = $('.selected td:nth-of-type(3)').html();
  changeWeight(-0.5, currentWeight);
});
