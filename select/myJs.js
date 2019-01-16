//We want to modify the html code of the cell when we mouseover it.
// We want to add a button (with an edit icon), that when clicked, whould send the user to the update form of the contact person

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
