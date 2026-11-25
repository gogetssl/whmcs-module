{*
    Help: the support contacts of the edition ($contact), the partner growth manager(s) ($managers) and the activity
    report for support - "Send report" opens the report dialog (report.tpl).
*}
{$w = 'widgets.support_widget'}
<div class="ggs-dcard">
    <span class="ggs-html">
        <div class="ggs-dcard__head"><h3>{tile icon='lifebuoy'}{t key="{$w}.title"}</h3></div>
    </span>
    <div class="ggs-dcard__rows">
        <span class="ggs-html">
            {if $contact.phone !== ''}
                <div class="ggs-row">
                    {icon name='phone-outline'}
                    <span class="ggs-row__name">{t key="{$w}.phone"}<small>{t key="{$w}.phone_detail"}</small></span>
                    <span class="ggs-row__val"><b>{$contact.phone}</b></span>
                </div>
            {/if}
            <div class="ggs-row">
                {icon name='email-outline'}
                <span class="ggs-row__name">{t key="{$w}.email"}<small>{$contact.email}</small></span>
                <span class="ggs-row__val"><a class="ggs-sbtn" href="mailto:{$contact.email}">{t key="{$w}.write"}</a></span>
            </div>
            <div class="ggs-row">
                {icon name='book-open-page-variant-outline'}
                <span class="ggs-row__name">{t key="{$w}.docs"}<small>{t key="{$w}.docs_detail"}</small></span>
                <span class="ggs-row__val"><a class="ggs-sbtn" href="{$contact.docs}" target="_blank" rel="noopener noreferrer">{t key="{$w}.open"}</a></span>
            </div>
            {foreach $managers as $manager}
                <div class="ggs-row">
                    {icon name='account-tie-outline'}
                    <span class="ggs-row__name">{$manager.name}<small>{t key="{$w}.manager"}</small></span>
                    <span class="ggs-row__val"><a class="ggs-sbtn" href="mailto:{$manager.email}">{t key="{$w}.write"}</a></span>
                </div>
            {/foreach}
        </span>
        <div class="ggs-row ggs-row--component">
            <span class="ggs-html">
                {icon name='file-document-outline'}
                <span class="ggs-row__name">{t key="{$w}.report"}<small>{t key="{$w}.report_detail"}</small></span>
            </span>
            <button type="button" class="mod-btn mod-btn--default" hx-get="{url action='report'}" hx-target="#ggs-dialog" hx-swap="innerHTML">
                <span class="mod-btn-text">{t key="{$w}.report_button"}</span>
            </button>
        </div>
    </div>
</div>
