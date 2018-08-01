//TODO scrap Jquery

//Select row
$("tbody tr").click(function () {
    $('.selected').removeClass('selected');
    $(this).addClass("selected");
  });

//Change day
//TODO last day zaciagany z BD
let day = 1;

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
  let newWeight = currentWeight+weight;
  $('.selected td:nth-of-type(3)').html(newWeight + "kg"); 
}


function getWeight()
{
  let tier = $('tr.selected').data("tier");
  if (tier == 1) return 5;
  else return 2.5;
}

$('#addWeight').click(function(){

  let weight = getWeight();
  let currentWeight = $('.selected td:nth-of-type(3)').html();
  changeWeight(weight, currentWeight);
});
$('#removeWeight').click(function(){

  let weight = 0 - getWeight();
  let currentWeight = $('.selected td:nth-of-type(3)').html();
  changeWeight(weight, currentWeight);
});

$('#success').click(function(){
  let success = $('.selected td:nth-of-type(4)');
  if(success.html() == "YES")
    success.html("NO");
  else
    success.html("YES");
});
/*
$('#endDay').click(function(){
  let selected = $('td:nth-of-type(3)');
  
for (let key in selected) {
  // skip loop if the property is from prototype
  if (!selected.hasOwnProperty(key)) continue;

  var obj = selected[key];
  for (var prop in obj) {
      // skip loop if the property is from prototype
      if(!obj.hasOwnProperty(prop)) continue;

      // your code
      console.log(prop + " = " + obj[prop]);
  }
}
});
*/

document.getElementById("logout").addEventListener("click", function(){
  window.location.href = "https://anklu.pl/fitness/index.php?logout=1"; 
})