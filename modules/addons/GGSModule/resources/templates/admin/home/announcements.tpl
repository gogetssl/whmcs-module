{* Announcements of the vendor ($items; body is HTML the library has reduced to a few harmless tags) *}
{$w = 'widgets.announcements_widget'}
<div class="ggs-dcard">
    <span class="ggs-html">
        <div class="ggs-dcard__head">
            <h3>{tile icon='bell-outline'}{t key="{$w}.title"}</h3>
            <span class="ggs-dcard__aside">{t key="{$w}.latest"}</span>
        </div>
    </span>
    <span class="ggs-html">
        <div class="ggs-dcard__body">
            {if $error !== ''}
                <p class="ggs-muted">{$error}</p>
            {elseif !$items}
                <p class="ggs-muted">{t key="{$w}.none"}</p>
            {else}
                <div class="ggs-alerts">
                    {foreach $items as $item}
                        <article class="ggs-alertrow">
                            {tile icon=$item.icon tone=$item.tone}
                            <div>
                                <h4>{$item.title}</h4>
                                <div class="ggs-alertrow__text">{$item.body nofilter}</div>
                            </div>
                            <time>{$item.date}</time>
                        </article>
                    {/foreach}
                </div>
            {/if}
        </div>
    </span>
</div>
