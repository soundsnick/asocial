<?php 
    global $message, $project, $components_slider, $mysqli;
    if($message == null){
        $message = 
        '<div class="message flex login-responser">
            <div class="message__icon"><i class="fa fa-exclamation"></i></div>
            <div class="message__text">
                <span></span>
            </div>
        </div>';
    }
?>
<main class="login-page page">
    <div class="container">
        <div class="flex">
            <div class="col-2">
                <div class="login__form--wrapper">
                    <form id="loginForm" class="login__form">
                        <div class="form__inputs card">
                            <input type="text" class="login__form--field" name="username" placeholder="Имя пользователя">
                            <input type="password" class="login__form--field" name="password" placeholder="Пароль">
                        </div>
                        <input type="button" class="login__form--button" value="Войти">
                    </form>
                </div>
            </div>
            <div class="col-8">
                <?=$message?>
                <div class="login-wrapper card">
                    <h1 class="login__title">Добро пожаловать в <?=$project['name']?></h1>
                    <div class="owl-carousel login__slider">
                        <?php
                            $querySlider = $mysqli->query("SELECT * FROM project_slider");
                            while($loginSlider = $querySlider->fetch_assoc()){
                                echo $components_slider->imageSlider($loginSlider, 'login__slider--item');
                            }
                        ?>
                    </div>
                    <p class="login__description">Здесь вы можете просматривать фотографии, ставить дизлайки. Предлагать вражду пользователям. Все по фану</p>
                    <a href="/register" class="login__button circle-button">Регистрация</a>
                    <span class="card__copyright"><?=$project['name']?> © 2018</span>
                </div>
            </div>
            <div class="col-2">
                <?php require 'components/sidebar-right.php';?>
            </div>
        </div>
    </div>
</main>
<script src="/scripts/login.js"></script>