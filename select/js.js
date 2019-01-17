$('tr td:nth-child(3)').on('mouseenter', function(){

    // Change the name to a button
    // On click of the button send the contained text to the update page
    var text=$(this).html();
    $(this).html('<form action="../Alter/alter.php" method="post"><button type="submit" class="btn btn-light mx-1 rm" name="updatecontact" value="'+text+'"><span class="mx-1">'+text +'</span><i class="rm far fa-edit fa-xs" style="margin-left:10px;"></i></button></form>');

    console.log(text);
    // //On click of the button send the text in the button to the update page
    // $('tr td:nth-child(3) button').on('click', function(){
    //   console.log("You cliked me!");
    // });

    //Get the name from the table
    var name=$(this).text();

    //make a request on the info of this contact person


});



$('tr td:nth-child(3)').on('mouseleave', function(){
      var text=$(this).text();
      $(this).html(text);
});



//We want to detach all the filters in the form and ad them back when a button is clicked

var trainee_filter=$('#trfilterid');
var company_filter=$('#compfilterid');
var industry_filter=$('#indfilterid').detach();
var department_filter=$('#depfilterid').detach();
var function_filter=$('#funfilterid').detach();
var city_filter=$('#cityfilterid').detach();
var querybtn=$('#querybtn');
// var trainee_filter=$('#trfilterid').detach();


//We now have all our detached elements inside our variable
//On click of the filter buttons, let the element prepend the form

//COMPANY
$('#company_check').on('click',function(){
  // if the objet is already in the DOM --> remove
  if($('#compfilterid').length){
    $('#compfilterid').detach();
    if($('#filtersform div').length!=0){
      $('#filtersform').append(querybtn);
    }else{
      $('#querybtn').detach();
    }
  }else{
    $('#filtersform').prepend(company_filter);
    if($('#filtersform div').length!=0){
      $('#filtersform').append(querybtn);
    }else{
      $('#querybtn').detach();
    }
  }

  //toggle its background class
  $(this).toggleClass("btn-secondary");
  $(this).toggleClass("btn-outline-secondary");
})


//CITY
$('#city_check').on('click',function(){
  // if the objet is already in the DOM --> remove
  if($('#cityfilterid').length){
        $('#cityfilterid').detach();

        if($('#filtersform div').length!=0){
          $('#filtersform').append(querybtn);
        }else{
        	$('#querybtn').detach();
        }
  }else{
    $('#filtersform').prepend(city_filter);
    if($('#filtersform div').length!=0){
      $('#filtersform').append(querybtn);
    }else{
      $('#querybtn').detach();
    }
  }

  //toggle its background class
  $(this).toggleClass("btn-secondary");
  $(this).toggleClass("btn-outline-secondary");
})

//INDUSTRY
$('#industry_check').on('click',function(){
  // if the objet is already in the DOM --> remove
  if($('#indfilterid').length){
    $('#indfilterid').detach();
    if($('#filtersform div').length!=0){
      $('#filtersform').append(querybtn);
    }else{
      $('#querybtn').detach();
    }
  }else{
    $('#filtersform').prepend(industry_filter);
    if($('#filtersform div').length!=0){
      $('#filtersform').append(querybtn);
    }else{
      $('#querybtn').detach();
    }
  }

  //toggle its background class
  $(this).toggleClass("btn-secondary");
  $(this).toggleClass("btn-outline-secondary");
})

//TRAINEE
$('#trainee_check').on('click',function(){
  // if the objet is already in the DOM --> remove
  if($('#trfilterid').length){
    $('#trfilterid').detach();
    if($('#filtersform div').length!=0){
      $('#filtersform').append(querybtn);
    }else{
      $('#querybtn').detach();
    }
  }else{
    $('#filtersform').prepend(trainee_filter);
    if($('#filtersform div').length!=0){
      $('#filtersform').append(querybtn);
    }else{
      $('#querybtn').detach();
    }
  }

  //toggle its background class
  $(this).toggleClass("btn-secondary");
  $(this).toggleClass("btn-outline-secondary");
})

//FUNCTION
$('#function_check').on('click',function(){
  // if the objet is already in the DOM --> remove
  if($('#funfilterid').length){
    $('#funfilterid').detach();
    if($('#filtersform div').length!=0){
      $('#filtersform').append(querybtn);
    }else{
      $('#querybtn').detach();
    }
  }else{
    $('#filtersform').prepend(function_filter);
    if($('#filtersform div').length!=0){
      $('#filtersform').append(querybtn);
    }else{
      $('#querybtn').detach();
    }
  }

  //toggle its background class
  $(this).toggleClass("btn-secondary");
  $(this).toggleClass("btn-outline-secondary");
})

//DEPARTMENT
$('#department_check').on('click',function(){
  // if the objet is already in the DOM --> remove
  if($('#depfilterid').length){
    $('#depfilterid').detach();
    if($('#filtersform div').length!=0){
      $('#filtersform').append(querybtn);
    }else{
      $('#querybtn').detach();
    }
  }else{
    $('#filtersform').prepend(department_filter);
    if($('#filtersform div').length!=0){
      $('#filtersform').append(querybtn);
    }else{
      $('#querybtn').detach();
    }
  }

  //toggle its background class
  $(this).toggleClass("btn-secondary");
  $(this).toggleClass("btn-outline-secondary");
})

//Status
$('#status_check').on('click',function(){
  // if the objet is already in the DOM --> remove
  if($('#statusfilterid').length){
    $('#statusfilterid').detach();
    if($('#filtersform div').length!=0){
      $('#filtersform').append(querybtn);
    }else{
      $('#querybtn').detach();
    }
  }else{
    $('#filtersform').prepend(status_filter);
    if($('#filtersform div').length!=0){
      $('#filtersform').append(querybtn);
    }else{
      $('#querybtn').detach();
    }
  }

  //toggle its background class
  $(this).toggleClass("btn-secondary");
  $(this).toggleClass("btn-outline-secondary");
})
