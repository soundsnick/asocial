// Функция оповещения форм
function authNotify(element, response){
	$('.message').addClass('error');
	$('.message').slideDown().css('display', 'flex');
	$(element).text(response).fadeIn();
}	
// Вход на сайт
$('.login__form--button').click(function(){
	$.ajax({
	  type: "POST",
	  url: "/modules/login.php",
	  data: $('#loginForm').serialize(),
	  success: function(msg){
			console.log(msg);
			// Оповещения
	    switch(msg){
	    	case 'empty field':
	    		authNotify('.message span','Заполните пустые поля');
	    		break;
	    	case 'false username':
	    		authNotify('.message span','Неправильное имя пользователя');
	    		break;
	    	case 'false password':
	    		authNotify('.message span','Неправильный пароль');
	    		break;
	    	case 'false':
	    		authNotify('.message span','Что-то пошло не так. Попробуйте обновить страницу');
	    		break;
	    	case 'true':
	    		location.href = '/feed';
	    		console.log('sd');
	    		break;
			}
			
	  }
	});
});
// Регистрация на сайт
$('.registration-form__button').click(function(){
	$.ajax({
	  type: "POST",
	  url: "/modules/register.php",
	  data: $('#registrationForm').serialize(),
	  success: function(msg){
			console.log(msg);
	  	// Оповещения
	    switch(msg){
	    	case 'empty field':
	    		authNotify('.registration-form__responser','Заполните пустые поля');
	    		break;
	    	case 'false username':
	    		authNotify('.registration-form__responser','Имя пользователя занята');
	    		break;
	    	case 'not appropriate passwords':
	    		authNotify('.registration-form__responser','Пароли не соотвествуют');
	    		break;
	    	case 'false email':
	    		authNotify('.registration-form__responser','Электронная почта занята');
	    		break;
	    	case 'false':
	    		authNotify('.registration-form__responser','Что-то пошло не так. Попробуйте обновить страницу');
	    		break;
	    	case 'true':
	    		location.href = '/feed';
	    		break;
	    }
	  }
	});
});
$('.owl-carousel').owlCarousel({
	items: 4,
	margin: 15
});