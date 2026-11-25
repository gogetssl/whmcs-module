{* System health ($health): a row per scheduled task with the time of its last run or what is wrong *}
{$w = 'widgets.system_check_widget'}
<div class="ggs-dcard">
    <span class="ggs-html">
        <div class="ggs-dcard__head">
            <h3>{if $health.ok}{tile icon='pulse' tone='ok'}{else}{tile icon='pulse' tone='bad'}{/if}{t key="{$w}.title"}</h3>
            {if $health.latest !== ''}<span class="ggs-dcard__aside">{icon name='clock-outline'}{$health.latest}</span>{/if}
        </div>
    </span>
    <span class="ggs-html">
        <div class="ggs-dcard__rows" id="ggs-health">
            {foreach $health.tasks as $task}
                <div class="ggs-row">
                    {icon name=$task.icon}
                    <span class="ggs-row__name">{$task.name}</span>
                    <span class="ggs-row__val">{pill tone=$task.tone label=$task.label icon=$task.pillIcon title=$task.title}</span>
                </div>
            {/foreach}
            {if $health.moduleLogOff}
                <div class="ggs-row">
                    {icon name='text-box-outline'}
                    <span class="ggs-row__name">{t key="{$w}.moduleLog"}</span>
                    <span class="ggs-row__val"><a href="{$health.logsUrl}">{pill tone='warn' label=$health.moduleLogLabel icon='alert-outline' title=$health.moduleLogTitle}</a></span>
                </div>
            {/if}
        </div>
    </span>
    <span class="ggs-html">
        <a class="ggs-dcard__foot" href="{$health.cronUrl}">{icon name='cog-outline'}<span>{t key="{$w}.review"}</span>{icon name='arrow-right'}</a>
    </span>
</div>
