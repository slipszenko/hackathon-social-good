{extends file="base.tpl"}

{block name=content}
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header main">
                <a class="navbar-brand" href="#">
                    <img width="150px" height="50px" src="/media/images/logo.png" alt="">
                </a>
            </div>
            <div class="navbar-header user row">
                    <a class="col-xs-4" href="#">
                        <i class="fa fa-user"></i><span>Perfil</span>
                    </a>
                     <a class="col-xs-4"  href="#">
                        <i class="fa fa-list"></i><span>Actividades</span>
                    </a>
                     <a class="col-xs-4" href="#">
                        <i class="fa fa-comment-o"></i><span>Muro</span>
                    </a>
            </div>
        </div>
        <header class="header-main">
            Proximas actividades
        </header>
    </nav>

    <div>
        <ul class="media-list">
            {foreach item=activity from=$activities}
                <li class="media">
                    <a class="pull-left" href="/activity/{$activity->id}/">
                        <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIj48L3JlY3Q+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+" style="width: 64px; height: 64px;">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{$activity->name}</h4>
                        {$activity->description}
                            <span><a> ></a></span>
                    </div>
                </li>
            {foreachelse}
                <li>No activities found</li>
            {/foreach}
        </ul>
    </div>

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
{/block}