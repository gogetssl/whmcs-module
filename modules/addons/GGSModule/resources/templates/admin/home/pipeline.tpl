{* Certificate pipeline (the one dark panel): how many orders are at each stage ($stages), then three shortcuts *}
{$w = 'widgets.pipeline_widget'}
<div class="ggs-dcard ggs-pipe">
    <span class="ggs-html">
        <div class="ggs-dcard__head">
            <h3>{tile icon='lock-outline' tone='dark'}{t key="{$w}.title"}</h3>
            <a class="ggs-dcard__aside" href="{$reportsUrl}">{t key="{$w}.open"}</a>
        </div>
    </span>
    <span class="ggs-html">
        <div class="ggs-dcard__body">
            {$inBar = 0}
            {foreach $stages as $stage}{if $stage.inBar}{$inBar = $inBar + 1}{/if}{/foreach}
            <div class="ggs-pipe__bar{if !$inBar} is-empty{/if}" aria-hidden="true">
                {foreach $stages as $stage}
                    {if $stage.inBar}<span class="{$stage.tone}" style="flex:{$stage.count}"></span>{/if}
                {/foreach}
            </div>
            <div class="ggs-pipe__stages">
                {foreach $stages as $stage}
                    <div class="ggs-stage">
                        <div class="ggs-stage__top"><span class="{$stage.tone}">{icon name=$stage.icon}</span>{t key="{$w}.{$stage.name}"}</div>
                        <b>{$stage.count}</b><small>{t key="{$w}.{$stage.name}_detail"}</small>
                    </div>
                {/foreach}
            </div>
        </div>
    </span>
    <span class="ggs-html">
        <div class="ggs-pipe__more">
            <a href="orders.php?status=Pending">{icon name='credit-card-clock-outline'}<span>{t key="{$w}.unpaid" n=$unpaid}<small>{t key="{$w}.unpaid_detail"}</small></span></a>
            <a href="{$reportsUrl}">{icon name='calendar-remove-outline'}<span>{t key="{$w}.expired" n=$expired}<small>{t key="{$w}.expired_detail"}</small></span></a>
            <a href="{$reportsUrl}">{icon name='calendar-month-outline'}<span>{t key="{$w}.renewals"}<small>{t key="{$w}.renewals_detail"}</small></span></a>
        </div>
    </span>
</div>
