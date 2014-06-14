{extends file="base.tpl"}

{block name=content}
    <h1>Inspira-t</h1>
    <p>You are logged in! Whooooo</p>
    <p>Hello {$name}</p>
    <p><a href="{reverser name=logout}">Logout</a></p>
{/block}