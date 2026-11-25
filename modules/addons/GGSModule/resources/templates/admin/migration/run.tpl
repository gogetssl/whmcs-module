{*
    One migration run ($run): the progress (the runner of resources/assets/js/pages/migration.js keeps posting
    batches until the run is finished), the result of the check after it, what was left out, the cron lines to
    change, and the run's log, backups and rollback.
*}
{$m = 'admin.migration'}
<div class="mod-box ggs-migration__run is-{$run.status}">
    <div class="mod-box-head">
        <div class="mod-box-top mod-bar">
            <span class="mod-box-icon">{icon name='sync'}</span>
            <div class="mod-bar-title"> {$run.title} </div>
        </div>
    </div>
    <div class="mod-box-body">
        <div class="mod-box-content">
            <div class="ggs-runner" x-data="moduleMigrationRunner({$run.runner|json_encode})" :class="'is-' + progress.status">
                <div class="ggs-runner__head">
                    <span class="ggs-runner__state" x-text="states[progress.status] || progress.status"></span>
                    <span class="ggs-runner__pct" x-text="progress.percent + '%'"></span>
                </div>
                <div class="ggs-runner__bar"><span :style="'width:' + progress.percent + '%'"></span></div>
                <ul class="ggs-runner__counts">
                    <li><b x-text="progress.jobs.done"></b> {t key="{$m}.runner_done"}</li>
                    <li><b x-text="progress.jobs.skipped"></b> {t key="{$m}.runner_skipped"}</li>
                    <li :class="progress.jobs.failed &gt; 0 &amp;&amp; 'is-bad'"><b x-text="progress.jobs.failed"></b> {t key="{$m}.runner_failed"}</li>
                    <li><b x-text="progress.jobs.pending"></b> {t key="{$m}.runner_pending"}</li>
                </ul>
                <p class="ggs-runner__note" x-show="running" x-cloak>{t key="{$m}.runner_keep_open"}</p>
                <p class="ggs-runner__error" x-show="error" x-text="error" x-cloak></p>
                <p class="ggs-runner__note" x-show="progress.finished" x-cloak>{t key="{$m}.runner_finished"} <a href="" @click.prevent="window.location.reload()">{t key="{$m}.runner_reload"}</a></p>
            </div>

            <span class="ggs-html">
                {if $run.stale}<div class="ggs-note is-warn">{t key="{$m}.run_stale"}</div>{/if}
                {if $run.verify}
                    <div class="ggs-note is-{$run.verify.tone}">{$run.verify.text}{if $run.verify.problems !== ''}<br>{$run.verify.problems}{/if}</div>
                {/if}
                {if $run.exceptions}
                    <details class="ggs-details">
                        <summary>{$run.exceptionsTitle}</summary>
                        <table class="ggs-table">
                            <thead><tr><th>{t key="{$m}.col_object"}</th><th>{t key="{$m}.col_status"}</th><th>{t key="{$m}.col_reason"}</th></tr></thead>
                            <tbody>
                                {foreach $run.exceptions as $exception}
                                    <tr><td>{$exception.object}</td><td>{$exception.status}</td><td>{$exception.reason}</td></tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </details>
                {/if}
                {if $run.cronRemove !== ''}
                    <details class="ggs-details">
                        <summary>{t key="{$m}.cron_title"}</summary>
                        <p>{t key="{$m}.cron_remove"}</p><pre>{$run.cronRemove}</pre>
                        <p>{t key="{$m}.cron_add"}</p><pre>{$run.cronAdd}</pre>
                    </details>
                {/if}
                {if $run.deactivated !== ''}<p class="ggs-muted">{$run.deactivated}</p>{/if}
                {if $run.autoRollback !== ''}<div class="ggs-note is-bad">{$run.autoRollback}</div>{/if}

                <div class="ggs-actions">
                    {if $run.errorReport}
                        <a class="mod-btn mod-btn--primary" href="{url page='migration' action='errorReport' id=$run.id}">{t key="{$m}.btn_error_report"}</a>
                    {/if}
                    <a class="mod-btn mod-btn--default" href="{url page='migration' action='log' id=$run.id}">{t key="{$m}.btn_log"}</a>
                    {if $run.hasBackups}
                        <span class="ggs-muted">{$run.backupsUntil}</span>
                        <form method="post" action="{url page='migration' action='extendBackups' id=$run.id}">
                            <input type="hidden" name="token" value="{$token}">
                            {if $wizard}<input type="hidden" name="return" value="wizard">{/if}
                            <button type="submit" class="mod-btn mod-btn--default">{t key="{$m}.btn_extend"}</button>
                        </form>
                        <form method="post" action="{url page='migration' action='deleteBackups' id=$run.id}" data-confirm="{t key="{$m}.confirm_delete"}">
                            <input type="hidden" name="token" value="{$token}">
                            {if $wizard}<input type="hidden" name="return" value="wizard">{/if}
                            <button type="submit" class="mod-btn mod-btn--default">{t key="{$m}.btn_delete_backups"}</button>
                        </form>
                        {if $run.canRollback}
                            <form method="post" action="{url page='migration' action='rollback' id=$run.id}" data-confirm="{t key="{$m}.confirm_rollback"}">
                                <input type="hidden" name="token" value="{$token}">
                                {if $wizard}<input type="hidden" name="return" value="wizard">{/if}
                                <button type="submit" class="mod-btn mod-btn--danger">{t key="{$m}.btn_rollback"}</button>
                            </form>
                        {/if}
                    {else}
                        <span class="ggs-muted">{t key="{$m}.backups_deleted"}</span>
                    {/if}
                </div>
            </span>
        </div>
    </div>
</div>
