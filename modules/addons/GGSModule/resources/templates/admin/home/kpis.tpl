{* The four figures at the top of the dashboard ($tiles), for the period chosen in Settings > General *}
<span class="ggs-html">
    <section class="ggs-dash__kpis" aria-label="{$period}">
        {foreach $tiles as $tile}
            <article class="ggs-kpi">
                <div class="ggs-kpi__top"><h3>{$tile.title}</h3>{tile icon=$tile.icon tone=$tile.tone}</div>
                <p class="ggs-kpi__value">{$tile.value}</p>
                <p class="ggs-kpi__detail">{icon name=$tile.detailIcon}{$tile.detail}</p>
            </article>
        {/foreach}
    </section>
</span>
