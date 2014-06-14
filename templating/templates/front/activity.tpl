{extends file="base.tpl"}

{block name=content}
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