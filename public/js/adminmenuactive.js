// $(document).ready(function() {
// 	var pageURL = $(location).attr("href");
//             alert(pageURL);
//             var selector = '.nav li';

// $(selector).on('click', function(){
//     $(selector).removeClass('active');
//     $(this).addClass('active');
// });

// });

$(function() {
      $( 'ul.nav li' ).on( 'click', function() {
      	alert("okae");
            $( this ).parent().find( 'li.active' ).removeClass( 'active' );
            $( this ).addClass( 'active' );
    });
  });
