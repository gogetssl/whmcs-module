{* Sales and margin of the dashboard period: four figures ($tiles), the margin as a bar, the paid / unpaid split *}
{$w = 'widgets.overview_widget'}
<div class="ggs-dcard">
    <span class="ggs-html">
        <div class="ggs-dcard__head">
            <h3>{tile icon='chart-line' tone='info'}{t key="{$w}.title"}</h3>
            <a class="ggs-dcard__aside" href="{url page='statistics'}">{t key="{$w}.statistics"}</a>
        </div>
    </span>
    <span class="ggs-html">
        <div class="ggs-money">
            {foreach $tiles as $tile}
                <div><span>{icon name=$tile.icon}{$tile.title}</span><b>{$tile.value}</b></div>
            {/foreach}
        </div>
        <div class="ggs-money__bar"><i style="width:{$bar}%"></i></div>
        <p class="ggs-money__note">{$note}</p>
    </span>
    <span class="ggs-html">
        <a class="ggs-dcard__foot" href="{url page='pricing'}">{icon name='tag-outline'}<span>{t key="{$w}.pricing"}</span>{icon name='arrow-right'}</a>
    </span>
</div>
