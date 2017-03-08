/*$('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  );
  $('.collapsible').collapsible();*/
  $(document).ready(function(){
    $('ul.tabs').tabs();
    $('select').material_select();

    $('#form1').submit(function(e){
        e.preventDefault();

        $.ajax({
            data:   $('#form1').serialize(),
            type:   'post',
            url:    './php/addVideoUrl.php',
            success: function(res){
                console.log(res);
            },
            error:   function(err){
                console.log(err);
            }

        });
    });
  });
