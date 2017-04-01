$(document).ready(function(){
  $('#tablej tbody tr:even').css('background-color','#F1FA93');
  $('#photos_inner').toggle(function(){
  var scrollAmount = $( this ).width() - $(this).parent().width();
  $(this).animate({'left':'-=' + scrollAmount}, 'slow');
}, function(){
  $(this).animate({'left':'0'}, 'slow');
});
  //alert($('#tablej tr').length + ' elements!');
 // alert($('img').length + ' elements!');
});

