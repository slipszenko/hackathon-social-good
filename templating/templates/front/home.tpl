{extends file="base.tpl"}

{block name=content}
    <p>You are logged in! Whooooo</p>
    <p>Hello {$name}</p>
    <p><a href="{reverser name=logout}">Logout</a></p>
{/block}