$(document).ready(function() {
 
$('#btn').click (function(){
 
$.ajax({
url:"signup.php",
type:"POST",
cashe:false,
data:{ surname:$('#surname').val(),name:$('#name').val(), patronymic:$('#patronymic').val(), email:$('#email').val() }, password:$('#password').val() // Отправка
success: function (data) {
$('#one').html(data);
}
 
});
 
});
 
});