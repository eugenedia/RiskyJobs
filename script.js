$(document).ready(function(){
  $('#tablej tbody tr').css('background-color','#ccffcc');
  $('#tablej tbody tr:even').css('background-color','#0099cc');
  $('#photos_inner').toggle(function(){
  var scrollAmount = $( this ).width() - $(this).parent().width();
  $(this).animate({'left':'-=' + scrollAmount}, 'slow');
}, function(){
  $(this).animate({'left':'0'}, 'slow');
});
  //alert($('#tablej tr').length + ' elements!');
 // alert($('img').length + ' elements!');
});

