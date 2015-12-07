$('#subsig').click(function(){
var name=$('#myusernamesig').val();
var pass=$('#mypasswordsig').val();
if((name!='')||(pass!=''))
{
$('#errorsig').text('Loading');

$.post('php/pubcheckdb.php',{name:name, pass:pass},function(data){

$('#errorsig').text(data);
if(($('#errorsig').text())=='valid')
location.href = 'beer2.php';
});
}
else{
$('#errorsig').text('Enter required data');
}
});