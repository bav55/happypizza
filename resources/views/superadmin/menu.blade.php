<li class="nav-item" data-toggle="tooltip" data-placement="right">
    <a class="nav-link" href="{{ route('selling.index') }}">
        <i class="fa fa-fw fa-cart-arrow-down"></i><span class="nav-link-text"> Заказы</span>
    </a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right">
    <a class="nav-link" href="{{ route('p-cods.index') }}">
        <i class="fa fa-fw fa-barcode"></i><span class="nav-link-text"> Промо код</span>
    </a>
</li>
<li class="nav-item dropdown" data-toggle="tooltip" data-placement="right">
    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseShop">
        <i class="fa fa-fw fa-archive"></i>
        <span class="nav-link-text"> Магазин</span>
    </a>
    <ul class="sidenav-second-level collapse" id="collapseShop">
        <li><a href="{{ route('goods.index') }}">Товары</a></li>
        <li><a href="{{ route('categories.index') }}">Категории товаров</a></li>
        <li><a href="{{ route('portions.index') }}">Порции</a></li>
        <li><a href="{{ route('preferences.index') }}">Предпочтения</a></li>
        <li><a href="{{ route('ingredients.index') }}">Ингредиенты</a></li>
        <li><a href="{{ route('action.index') }}">Акции</a></li>
        <li><a href="{{ route('action-pickup.index') }}">Дополнительные акции </a></li>
        <li><a href="{{ route('recomend.index') }}">Рекомендуемые</a></li>
        <li><a href="{{ route('frontpad.index') }}">Связь с FrontPad</a></li>
    </ul>
</li>
<li class="nav-item dropdown" data-toggle="tooltip" data-placement="right">
    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePage">
        <i class="fa fa-fw fa-sticky-note"></i>
        <span class="nav-link-text"> Страницы</span>
    </a>
    <ul class="sidenav-second-level collapse" id="collapsePage">
        <li><a href="{{ route('pages.index') }}">Страницы</a></li>
        <li><a href="{{ route('news.index') }}">Новости</a></li>
        <li><a href="{{ route('faqs.index') }}">ЧаВо</a></li>
    </ul>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right">
    <a class="nav-link" href="{{ route('mailing.index') }}">
        <i class="fa fa-fw fa-envelope-o"></i><span class="nav-link-text"> Рассылка</span>
    </a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right">
    <a class="nav-link" href="{{ route('votes.index') }}">
        <i class="fa fa-fw fa-thumbs-o-up"></i><span class="nav-link-text"> Опросы</span>
    </a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right">
    <a class="nav-link" href="{{ route('subscriptions.index') }}">
        <i class="fa fa-fw fa-users"></i><span class="nav-link-text"> Подписчики</span>
    </a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right">
    <a class="nav-link" href="{{ route('review.index') }}">
        <i class="fa fa-fw fa-star-half-o"></i><span class="nav-link-text"> Отзывы</span>
    </a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right">
    <a class="nav-link" href="{{ route('vacancy.index') }}">
        <i class="fa fa-fw fa-user-plus"></i><span class="nav-link-text"> Вакансии</span>
    </a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right">
    <a class="nav-link" href="{{ route('get_clients') }}">
        <i class="fa fa-fw fa-users"></i><span class="nav-link-text"> Клиенты</span>
    </a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right">
    <a class="nav-link" href="{{ route('operators.index') }}">
        <i class="fa fa-fw fa-users"></i><span class="nav-link-text"> Операторы</span>
    </a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right">
    <a class="nav-link" href="{{ route('media.index') }}">
        <i class="fa fa-fw fa-image"></i><span class="nav-link-text"> Медиафайлы</span>
    </a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right">
    <a class="nav-link" href="{{ route('setting') }}">
        <i class="fa fa-fw fa-gears"></i><span class="nav-link-text"> Настройки</span>
    </a>
</li>