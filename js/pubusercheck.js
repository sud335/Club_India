$(function(){
var u='';
var p='';
var e='';
$('#myusername').keyup(function(){

var name=$(this).val();
$('#uerr').text('Searching..');
if(name!=''){
$.post('php/checkname.php',{name:name},function(data){
$('#uerr').text(data);
if(($('#uerr').text())=='Valid'){
u='yes';
$('#myusername').focusout(function(){
$('#uerr').text('');
});
}
else{
u='no';
}
});
}
else{
$('#uerr').text('*');
u='no';
}
});
$('#mypassword').keyup(function(){
var pass=$(this).val();

if(pass!=''){
$('#p1err').text('');
}
else{
$('#p1err').text('*');

}
});

$(mypassword2).keyup(function(){
var pass2=$(this).val();
var pass=$(mypassword).val();
$('#perr').text('Matching..');
if(pass2!==''){
if(pass===pass2){
$('#perr').text('Passwords match');
p='yes';
$('#mypassword2').focusout(function(){
$('#perr').text('');
});
}
else{
$('#perr').text('Passwords dont match');
p='no';
}
}
else{
$('#perr').text('*');
p=no;
}
});

$('#email').keyup(function(){
email=$(this).val();
if(email!=''){
$.post('php/checkemail.php',{email:email},function(data){
$('#emerr').text(data);
if(($('#emerr').text())=='Valid'){
e='yes';
$('#email').focusout(function(){
$('#emerr').text('');
});
}
else{
e='no';
}
});
}
else{
$('#emerr').text('*');
e='no';
}
});

$('#med').focusout(function(){
$.post('php/checkfile.php',{mediafile:mediafile},function(data){
$('#mediaErr').text(data);
)};

$('#sub').click(function(){

if(u=='yes' && e=='yes' && p=='yes')
{

	var name=$('#myusername').val();
	var pass=$('#mypassword').val();
	var email=$('#email').val();
	var fn=$('#fn').val();
	var ln=$('#ln').val();
	$.post('php/checkinguser.php',{name:name, pass:pass, email:email, fn:fn, ln:ln},function(data){
$('#allerr').text(data);
if(($('#allerr').text())=='Data Submitted'){
location.href = 'beer2.php';
}
});

}
else
{
alert('Correct marked fields');
	$('#allerr').text('Correct marked fields');
}

});
});