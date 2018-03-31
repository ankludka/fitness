//git master change
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


//refactor this - jedna funkcja przyjmująca wagę jako argument. Dodać jako event listener do poszczególnych id.
//functions to change weights
$('#addOne').click(function(){
    var kilos = $('.selected .kilos').html();
    weight = parseFloat(kilos)+1;
    $('.selected .kilos').html(weight+" kg");
//    var name = ($('.selected th').html());
//    sendWeight(name, weight);
});

$('#addHalf').click(function(){
    var kilos = $('.selected .kilos').html();
    weight = parseFloat(kilos)+0.5;
    $('.selected .kilos').html(weight+" kg");
});

$('#subOne').click(function(){
    var kilos = $('.selected .kilos').html();
    weight = parseFloat(kilos)-1;
    $('.selected .kilos').html(weight+" kg");
});

$('#subHalf').click(function(){
    var kilos = $('.selected .kilos').html();
    weight = parseFloat(kilos)-0.5;
    $('.selected .kilos').html(weight+" kg");
});
