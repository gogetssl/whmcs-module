{*
    Wizard page 3 "Legacy modules found": what was detected ($modules) and, per module, the decision
    Migrate / Install standalone. Nothing is changed here: the migration itself is a later page of the wizard.
*}
<span class="ggs-html">
    <p class="ggs-checks__intro">{$intro}</p>
    {foreach $modules as $module_}
        <div class="ggs-legacy">
            <div class="ggs-legacy__head">
                <b>{$module_.label}</b> <span class="ggs-muted">{$module_.version}</span>
                <span class="ggs-checks__status is-{$module_.band}">{$module_.bandText}</span>
            </div>
            <ul class="ggs-legacy__facts">
                {foreach $module_.facts as $fact}<li>{$fact}</li>{/foreach}
            </ul>
            {if $module_.reason !== ''}<p class="ggs-muted">{$module_.reason}</p>{/if}
            {if !$module_.supported}<div class="ggs-note is-bad">{t key='step3.unsupported_hint'}</div>{/if}
        </div>
    {/foreach}
    <p class="ggs-muted">{t key='step3.runs_later'}</p>
</span>

<form method="post" action="{url action='choice'}" class="mod-w-full">
    <input type="hidden" name="token" value="{$token}">
    {foreach $modules as $module_}
        <div class="mod-field">
            <label class="mod-field-label mod-solo"><span>{$module_.choiceLabel}</span>{tip text=$module_.choiceHint}</label>
            <select name="choice_{$module_.source}" class="mod-input">
                {if $module_.supported}
                    <option value="{$migrate}"{if $module_.choice === $migrate} selected{/if}>{t key='admin.configuration.shared.providers.legacy_choice_provider.option_migrate'}</option>
                {/if}
                <option value="{$skip}"{if $module_.choice === $skip} selected{/if}>{t key='admin.configuration.shared.providers.legacy_choice_provider.option_skip'}</option>
            </select>
        </div>
    {/foreach}
    <button type="submit" class="mod-btn mod-btn--success"><span class="mod-btn-text">{t key='step3.next_step_btn'}</span></button>
</form>
