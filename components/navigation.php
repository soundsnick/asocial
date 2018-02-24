<header class="header">
    <div class="container">
        <div class="flex">
            <div class="col-3">
                <h1 class="header__logo logo"><?=$project['name']?></h1>
            </div>
            <div class="col">
                <nav class="header__navigation">
                    <?php if(logged()):?>
                    <a href="" class="header__navigation--item">Новости</a>
                    <a href="" class="header__navigation--item">Сообщения</a>
                    <a href="" class="header__navigation--item">Группы</a>
                    <a href="" class="header__navigation--item">Настройки</a>
                    <a href="/logout" class="header__navigation--item">Выйти</a>
                    <?php endif;?>
                    <?php if(!logged()):?>
                    <a href="/login" class="header__navigation--item">Войти</a>
                    <?php endif;?>
                </nav>
            </div>
        </div>
    </div>
</header>