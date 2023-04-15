

//валидация
let jin = document.getElementById("first_name");
let las = document.getElementById("last_name");
let mail = document.getElementById("your_email");
let btn = document.getElementById("submit");
jin.addEventListener('keydown', function(e){
    if( e.key.match(/[0-9]/) ) return e.preventDefault();
}); // Будет перехватывать все числа при ручном вводе.
// Тажке нужна, чтобы replace не сбрасывал каретку, срабатывая каждый раз.
las.addEventListener('keydown', function(e){
    if( e.key.match(/[0-9]/) ) return e.preventDefault();
}); // Будет перехватывать все числа при ручном вводе.
mail.addEventListener('keydown', function(e){
    if( e.key.match(/[а-яё]/) ) return e.preventDefault();
});
const inp = e.target.value.replace('+7');
const nums = inp.replace(/\D/g, '');
const x = nums.match(/(\d{0,3})(\d{0,3})(\d{0,4})/);

e.target.value = '+7' + (!x[2] ? x[1] : '(' + x[1] + ') ') + x[2] + (x[3] ? '-' + x[3] : '');

// Тажке нужна, чтобы replace не сбрасывал каретку, срабатывая каждый раз.
jin.addEventListener('input', function(e){
    // На случай, если умудрились ввести через копипаст или авто-дополнение.
    jin.value = jin.value.replace(/[0-9]/g, "");
});
