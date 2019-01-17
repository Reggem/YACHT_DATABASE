//We want to detach all the filters in the form and ad them back when a button is clicked

var trainee_filter=$('#trfilterid').detach();
var company_filter=$('#compfilterid').detach();
var industry_filter=$('#indfilterid').detach();
var department_filter=$('#depfilterid').detach();
var function_filter=$('#funfilterid').detach();
var city_filter=$('#cityfilterid').detach();
var querybtn=$('#querybtn').detach();
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
