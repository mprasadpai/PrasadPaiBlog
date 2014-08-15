
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="Post2Wall/js/jquery.livequery.js"></script>
<script type="text/javascript">


$(document).ready(function () { // When the dom is ready
    $('#fetched_data').hide(); // Hide div id by default
    $('#ajax_flag').val(0); // Initialize value to zero i.e  input tag with id='ajax_flag' will have a new attribute 'value=0'
    $(document).keypress(function (e) { // Listen to keyboard press event by user 
        if (e.keyCode == 32 || e.charCode == 32) { // if user press spacebar 
            var content = $('#wall').val(); // Get all the data in the textarea 
            var url = content.match(/https?:\/\/([-\w\.]+)+(:\d+)?(\/([\w/_\.]*(\?\S+)?)?)?/);
            // regular expression that will allow us to extract url from the textarea
            if (url.length > 0 && $('#ajax_flag').val() == 0) { // If there's atleast one url entered in the textarea
                //ajax_flag ensure that if a url is found and user press spacebar,ajax will trigger only once .
                $("#fetched_data").slideDown('show'); // show this div with a 'slidedown' effect - previously hiddden by default
                $("#loader").html("<img style='float:right;' src='Post2Wall/image/ajax-loader.gif'>"); // Add an Ajax loading image similar to facebook
                $.get("Post2Wall/get_content.php?url=" + url[0], function (response) { // Ajax call using get passing the url extracted from the textarea
                    $("#ajax_content").html(response) //Place the response processed by get_content.php and place it in a div with id = ajax_content
                    $('#loader').empty(); // remove the ajax loading image now
                    $('img#1').fadeIn(); // Add a fading effect with the first image thumbnail extracted from the external website
                    $('#current_img').val(1); // Initiate value =1 - this will be used for the next / previous button
                });

                $('#ajax_flag').val(1); // Ensure that only once ajax will trigger if a url match is found in the textarea
            }
            return false();
        }

    });



    ///////////////////////////////////////////////////////////////////////	 Next image
    $('#next').livequery("click", function () { // when user click on next button
        var firstimage = $('#current_img').val(); // get the numeric value of the current image
        if (firstimage <= $('#total_images').val() - 1) // as long as last image has not been reached
        {
            $('img#' + firstimage).hide(); // hide the current image to be able to display the next image
            firstimage = parseInt(firstimage) + parseInt(1); // Increment image no so that next image no. can be displayed
            $('#current_img').val(firstimage); // Incremented in input tag
            $('img#' + firstimage).show(); // show second image
        }
        $('#totalimg').html(firstimage + ' of ' + $('#total_images').val()); // Update the current image no display value
    });
    ///////////////////////////////////////////////////////////////////////	 Next image
    ///////////////////////////////////////////////////////////////////////	 prev image
    $('#prev').livequery("click", function () { // When user clicks on Previous Button
        //Same logic as for Next Button
        var firstimage = $('#current_img').val();


        if (firstimage >= 2) {
            $('img#' + firstimage).hide();
            firstimage = parseInt(firstimage) - parseInt(1);
            $('#current_img').val(firstimage);
            $('img#' + firstimage).show();
        }
        $('#totalimg').html(firstimage + ' of ' + $('#total_images').val());
    });
    ///////////////////////////////////////////////////////////////////////	 prev image
    ///////////////////////////////Share Button
    $('#shareButton').livequery("click", function () { //if user clicks on share button
        var textarea_content = $('textarea#wall').val(); // get the content of what user typed ( in textarea ) 
        if (textarea_content != '') { // if textarea is not empty 
            var sitetitle = $('label.title').html(); // then get external site title (if there's any )
            if (sitetitle == null) {
                sitetitle = ' ';
            }

            var siteurl = $('label.url').html(); // get site url ( if there's any )
            if (siteurl == null) { // if no value retrieved
                siteurl = ' '; //set to blank to prevent 'null' or 'undefined' displayed on page
            }
            var sitedesc = $('label.desc').html(); // get external site description ( if there's any)
            if (sitedesc == null) { // if no value retrieved
                sitedesc = ' '; //set to blank to prevent 'null' or 'undefined' displayed on page
            }
            var current_image_id = $('input#current_img').val(); // get the current image thumbnail id (if there's any) 
            // we need that id to post the correct image chosen by user in  wall post
            if (current_image_id != '') { //make sure id is retrieved successfully 
                var current_image_url = $("img#" + current_image_id).attr("src"); // get the current image displayed in thumbnail url in "src" tag
                if (current_image_url != '') { //if there's an image url
                    var image_html = '<div class="img_attachment"> <img class="external_pic" width="90" height="67"  src="' + current_image_url + '">'; // prepare image url 'embeded with appropriate html
                } else {
                    var image_html = ''; //No image to display ( it means that no image url was retrieved from external website , ( ignoring <div class = 'img_attachement> .. </div>
                }
            } else {
                var image_html = ''; // set to nothing
            }

            var wall_post = '<li> <img src="image/avatar.jpg" class="avatar">    <div class="status">     <h2><a href="#" target="_blank">Prasad Pai</a></h2>  <p class="message">' + textarea_content + '</p> ' + image_html + '<div class="data"><p class="name"><a href="' + siteurl + '" target="_blank">' + sitetitle + '</a></p><p class="caption">' + siteurl + '</p><p class="description">' + sitedesc + '</p></div></div> </div><p class="likes">0 secs ago ·           0 Likes </p></li>';



            var message_wall = $('#message_wall').attr('value');

            $.ajax({
                type: "GET",
                url: "insert.php",
                data: "message_wall=" + wall_post,
                success: function () {
                    $('ul#posts').prepend(wall_post);

                }
            });
            //Add the prepared html to add in div with id = wallz
            //After adding the post wall ,
            $('textarea#wall').val(''); // remove text in the textarea 
            $('#ajax_content').empty(); // empty the div with id = ajax_content ( contains previous content fetched via ajax )
            $('#fetched_data').hide(); // hide the div 
            $('#ajax_flag').val(0); //reset  this to zero  
        } else {
            alert('Enter some text ! '); // just in case some morons try to click on share witout writing anything :)
        }

    });


});
</script>


<div id="wrapper">
  <form>
    <input  name="current_img" id="current_img" type="hidden"/>
    <input  name="ajax_flag" id="ajax_flag" type="hidden"/>
  </form>
  <div style="border:solid 1px #B4BBCD;">
    <div id="fetched_data">
      <div id="loader"> </div>
      <div id="ajax_content"></div>
    </div>
  </div>
  <div id="textareaWrap">
    <textarea  id="wall"></textarea>
    <div id="sharebtn"> <a class="button Share" style="" id="shareButton"> Share</a> </div>
  </div>
  <!-- wall starts here -->
  <div id="wallz" class="fb_wall">
 	<ul id="posts">
   
    </ul>
  </div>

</div>