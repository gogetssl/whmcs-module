{* Legacy module migration ($migration): the old modules found, the last run, how long its backups are kept *}
{$w = 'widgets.migration_widget'}
<div class="ggs-dcard">
    <span class="ggs-html">
        <div class="ggs-dcard__head">
            <h3>{tile icon='database-arrow-right'}{t key="{$w}.title"}</h3>
            {if $migration.run}{pill tone=$migration.run.tone label=$migration.runLabel icon=$migration.run.icon}{/if}
        </div>
    </span>
    <span class="ggs-html">
        <div class="ggs-dcard__rows">
            {foreach $migration.sources as $source}
                <div class="ggs-row">
                    {icon name='package-variant-closed'}
                    <span class="ggs-row__name">{$source.name}{if $source.choice !== ''}<small>{$source.choice}</small>{/if}</span>
                    <span class="ggs-row__val"><b>{t key="{$w}.services" n=$source.services}</b></span>
                </div>
            {/foreach}
            {if $migration.run}
                <p class="ggs-dcard__sub">
                    {icon name='check-circle-outline'}{t key="{$w}.last_run_counts" done=$migration.run.counts.done failed=$migration.run.counts.failed skipped=$migration.run.counts.skipped}{if $migration.run.backups !== ''}. {t key="{$w}.backups_until" date=$migration.run.backups}{/if}
                </p>
                {if $migration.run.removed !== ''}
                    <p class="ggs-dcard__sub">{icon name='clock-outline'}{t key="{$w}.removed_on" date=$migration.run.removed days=$migration.days}</p>
                {/if}
            {/if}
        </div>
    </span>
    <span class="ggs-html">
        <a class="ggs-dcard__foot" href="{url page='migration'}">{icon name='database-outline'}<span>{t key="{$w}.open"}</span>{icon name='arrow-right'}</a>
    </span>
</div>
