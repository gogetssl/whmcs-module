{if $allOk === true}
<div class="validate-ssl-unified ggs-cert ggs-smime">

    <section class="ggs-card ggs-hero ggs-hero--wait">
        <div class="ggs-hero__head">
            <span class="ggs-hero__icon">
                <svg class="ggs-ic" viewBox="0 0 24 24" aria-hidden="true"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            </span>
            <div class="ggs-hero__title">
                <span class="ggs-badge ggs-badge--wait">{$text->t('smimeAwaitingOrder')}</span>
                <h3>{$productName|escape}</h3>
                <p class="ggs-hero__domain">{if $smimeRenewal}{$text->t('smimeRenewalIntro')}{else}{$text->t('smimeConfigurationIntro')}{/if}</p>
                {if $smimeCurrentValidTill}<p class="ggs-hero__domain">{$text->t('smimeCurrentValid')|sprintf:$smimeCurrentValidTill}</p>{/if}
            </div>
        </div>
    </section>

    <div id="ggs-smime-alerts"></div>

    <form id="ggs-smime-form" autocomplete="off" onsubmit="return false;" novalidate>
        <section class="ggs-card">
            <h4 class="ggs-card__title">
                <svg class="ggs-ic" viewBox="0 0 24 24" aria-hidden="true"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                {$text->t('smimeEmailsSection')}
            </h4>
            <div class="ggs-form">
                <div class="ggs-field">
                    <label for="ggs-smime-email">{$text->t('smimeEmailLabel')} <span class="ggs-req">*</span></label>
                    <input type="email" id="ggs-smime-email" name="smime_email" class="form-control" required
                           value="{if $smimePreviousEmails}{$smimePreviousEmails[0]|escape:'htmlall'}{else}{$smimeClient.email|escape:'htmlall'}{/if}" placeholder="john.doe@example.com">
                    <small>{$text->t('smimeEmailHint')}</small>
                </div>
                <div class="ggs-field">
                    <label for="ggs-smime-more">{$text->t('smimeAdditionalEmailsLabel')}</label>
                    <textarea id="ggs-smime-more" name="smime_additional_emails" class="form-control" rows="3" placeholder="j.doe@example.com">{foreach from=$smimePreviousEmails item=previousEmail name=prev}{if !$smarty.foreach.prev.first}{$previousEmail|escape:'htmlall'}
{/if}{/foreach}</textarea>
                    <small>{$text->t('smimeAdditionalEmailsHint')|sprintf:$smimeMaxEmails}</small>
                </div>
                <p class="ggs-note">{$text->t('smimeValidationInfo')}</p>
            </div>
        </section>

        {if $smimeRequiresOrganization}
            <section class="ggs-card">
                <h4 class="ggs-card__title">
                    <svg class="ggs-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2M10 6h4M10 10h4M10 14h4M10 18h4"/></svg>
                    {$text->t('smimeOrganizationSection')}
                </h4>
                <div class="ggs-form">
                    <p class="ggs-note ggs-note--plain">{$text->t('smimeOrganizationHint')}</p>
                    <div class="ggs-fields">
                        <div class="ggs-field"><label for="ggs-org-name">{$text->t('smimeOrg_name')} <span class="ggs-req">*</span></label><input type="text" id="ggs-org-name" name="org[name]" class="form-control" required value="{$smimeClient.companyname|escape:'htmlall'}"></div>
                        <div class="ggs-field"><label for="ggs-org-division">{$text->t('smimeOrg_division')}</label><input type="text" id="ggs-org-division" name="org[division]" class="form-control"></div>
                        <div class="ggs-field"><label for="ggs-org-phone">{$text->t('smimeOrg_phone')} <span class="ggs-req">*</span></label><input type="text" id="ggs-org-phone" name="org[phone]" class="form-control" required value="{$smimeClient.phonenumber|escape:'htmlall'}"></div>
                        <div class="ggs-field"><label for="ggs-org-country">{$text->t('smimeOrg_country')} <span class="ggs-req">*</span></label>
                            {if $smimeCountries}
                                <select id="ggs-org-country" name="org[country]" class="form-control" required>
                                    {foreach from=$smimeCountries key=code item=name}<option value="{$code|escape:'htmlall'}"{if $code == $smimeClient.country} selected{/if}>{$name|escape}</option>{/foreach}
                                </select>
                            {else}
                                <input type="text" id="ggs-org-country" name="org[country]" class="form-control" required maxlength="2" value="{$smimeClient.country|escape:'htmlall'}">
                            {/if}
                        </div>
                        <div class="ggs-field"><label for="ggs-org-region">{$text->t('smimeOrg_region')}{if $smimeRegionRequired} <span class="ggs-req">*</span>{/if}</label><input type="text" id="ggs-org-region" name="org[region]" class="form-control" value="{$smimeClient.state|escape:'htmlall'}"{if $smimeRegionRequired} required{/if}></div>
                        <div class="ggs-field"><label for="ggs-org-city">{$text->t('smimeOrg_city')} <span class="ggs-req">*</span></label><input type="text" id="ggs-org-city" name="org[city]" class="form-control" required value="{$smimeClient.city|escape:'htmlall'}"></div>
                        <div class="ggs-field"><label for="ggs-org-postal">{$text->t('smimeOrg_postal_code')}</label><input type="text" id="ggs-org-postal" name="org[postal_code]" class="form-control" value="{$smimeClient.postcode|escape:'htmlall'}"></div>
                        <div class="ggs-field"><label for="ggs-org-address1">{$text->t('smimeOrg_address_line_1')} <span class="ggs-req">*</span></label><input type="text" id="ggs-org-address1" name="org[address_line_1]" class="form-control" required value="{$smimeClient.address1|escape:'htmlall'}"></div>
                        <div class="ggs-field"><label for="ggs-org-address2">{$text->t('smimeOrg_address_line_2')}</label><input type="text" id="ggs-org-address2" name="org[address_line_2]" class="form-control" value="{$smimeClient.address2|escape:'htmlall'}"></div>
                        <div class="ggs-field"><label for="ggs-org-duns">{$text->t('smimeOrg_duns')}</label><input type="text" id="ggs-org-duns" name="org[duns]" class="form-control"></div>
                        <div class="ggs-field"><label for="ggs-org-lei">{$text->t('smimeOrg_lei')}</label><input type="text" id="ggs-org-lei" name="org[lei]" class="form-control"></div>
                    </div>
                </div>
            </section>

            <section class="ggs-card">
                <h4 class="ggs-card__title">
                    <svg class="ggs-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    {$text->t('smimeAdministratorSection')}
                </h4>
                <div class="ggs-form">
                    <p class="ggs-note ggs-note--plain">{$text->t('smimeAdministratorHint')}</p>
                    <div class="ggs-fields">
                        <div class="ggs-field"><label for="ggs-admin-first">{$text->t('smimeAdmin_first_name')} <span class="ggs-req">*</span></label><input type="text" id="ggs-admin-first" name="admin[first_name]" class="form-control" required value="{$smimeClient.firstname|escape:'htmlall'}"></div>
                        <div class="ggs-field"><label for="ggs-admin-last">{$text->t('smimeAdmin_last_name')} <span class="ggs-req">*</span></label><input type="text" id="ggs-admin-last" name="admin[last_name]" class="form-control" required value="{$smimeClient.lastname|escape:'htmlall'}"></div>
                        <div class="ggs-field"><label for="ggs-admin-title">{$text->t('smimeAdmin_title')}</label><input type="text" id="ggs-admin-title" name="admin[title]" class="form-control"></div>
                        <div class="ggs-field"><label for="ggs-admin-email">{$text->t('smimeAdmin_email')} <span class="ggs-req">*</span></label><input type="email" id="ggs-admin-email" name="admin[email]" class="form-control" required value="{$smimeClient.email|escape:'htmlall'}"></div>
                        <div class="ggs-field"><label for="ggs-admin-phone">{$text->t('smimeAdmin_phone')} <span class="ggs-req">*</span></label><input type="text" id="ggs-admin-phone" name="admin[phone]" class="form-control" required value="{$smimeClient.phonenumber|escape:'htmlall'}"></div>
                        <div class="ggs-field"><label for="ggs-admin-country">{$text->t('smimeAdmin_country')} <span class="ggs-req">*</span></label>
                            {if $smimeCountries}
                                <select id="ggs-admin-country" name="admin[country]" class="form-control" required>
                                    {foreach from=$smimeCountries key=code item=name}<option value="{$code|escape:'htmlall'}"{if $code == $smimeClient.country} selected{/if}>{$name|escape}</option>{/foreach}
                                </select>
                            {else}
                                <input type="text" id="ggs-admin-country" name="admin[country]" class="form-control" required maxlength="2" value="{$smimeClient.country|escape:'htmlall'}">
                            {/if}
                        </div>
                        <div class="ggs-field"><label for="ggs-admin-region">{$text->t('smimeAdmin_region')}</label><input type="text" id="ggs-admin-region" name="admin[region]" class="form-control" value="{$smimeClient.state|escape:'htmlall'}"></div>
                        <div class="ggs-field"><label for="ggs-admin-city">{$text->t('smimeAdmin_city')}</label><input type="text" id="ggs-admin-city" name="admin[city]" class="form-control" value="{$smimeClient.city|escape:'htmlall'}"></div>
                        <div class="ggs-field"><label for="ggs-admin-postal">{$text->t('smimeAdmin_postal_code')}</label><input type="text" id="ggs-admin-postal" name="admin[postal_code]" class="form-control" value="{$smimeClient.postcode|escape:'htmlall'}"></div>
                        <div class="ggs-field"><label for="ggs-admin-address1">{$text->t('smimeAdmin_address_line_1')}</label><input type="text" id="ggs-admin-address1" name="admin[address_line_1]" class="form-control" value="{$smimeClient.address1|escape:'htmlall'}"></div>
                    </div>
                </div>
            </section>
        {/if}

        <section class="ggs-card">
            <details class="ggs-details">
                <summary class="ggs-card__title">
                    <svg class="ggs-ic" viewBox="0 0 24 24" aria-hidden="true"><circle cx="7.5" cy="15.5" r="5.5"/><path d="m21 2-9.6 9.6M15.5 7.5l3 3L22 7l-3-3"/></svg>
                    {$text->t('smimeCsrSection')} <span class="ggs-optional">{$text->t('smimeOptional')}</span>
                </summary>
                <div class="ggs-form">
                    <div class="ggs-field">
                        <label for="ggs-smime-csr">{$text->t('smimeCsrLabel')}</label>
                        <textarea id="ggs-smime-csr" name="smime_csr" class="form-control ggs-mono" rows="6" placeholder="-----BEGIN CERTIFICATE REQUEST-----"></textarea>
                        <small>{$text->t('smimeCsrHint')}</small>
                    </div>
                </div>
            </details>
        </section>

        {if $agreement}
            <section class="ggs-card">
                <div class="ggs-form ggs-agreement">
                    {if $agreement.text}<p class="ggs-note ggs-note--plain">{$agreement.text}</p>{/if}
                    <label class="ggs-check">
                        <input type="checkbox" name="agreement" value="1" required>
                        <span>{$text->t('sslConfigAgreement')} {if $agreement.url}<a href="{$agreement.url|escape}" target="_blank" rel="noopener">{$agreement.name|escape}</a>{else}{$agreement.name|escape}{/if}</span>
                    </label>
                </div>
            </section>
        {/if}

        <div class="ggs-actions ggs-actions--end">
            <button id="ggs-smime-submit" type="button" class="ggs-btn ggs-btn--primary">
                <svg class="ggs-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
                <span>{$text->t('smimeSubmitOrder')}</span>
            </button>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var clone = $('.validate-ssl-unified').clone();
        $('.product-details').html(clone);
        $('.mod-module .validate-ssl-unified').remove();
        // the module's stylesheet lives in the block below and has to survive it
        $('head').append($('link[href*="theme.css"]').first());
        // WHMCS's own tab strip under the page: the module shows everything above it
        $('.product-details').closest('.tab-pane').find('> .nav-tabs, > .tab-content').remove();
    });

    $(document).on('click', '#ggs-smime-submit', function () {
        var form   = document.getElementById('ggs-smime-form');
        var alerts = $('#ggs-smime-alerts');
        var btn    = $(this);
        var label  = btn.find('span');
        var text   = label.text();

        alerts.html('');
        if (typeof form.reportValidity === 'function' && !form.reportValidity()) {
            return;
        }

        var data = $(form).serializeArray();
        data.push({ldelim}name: 'mod-action', value: 'createSmime'{rdelim});
        data.push({ldelim}name: 'token', value: '{$csrfToken}'{rdelim});

        function fail(message) {
            alerts.html($('<div class="alert alert-danger" role="alert"></div>').html(message));
            btn.prop('disabled', false);
            label.text(text);
            window.scrollTo(0, alerts.offset().top - 90);
        }

        btn.prop('disabled', true);
        label.text('{$text->t('smimeOrdering')|escape:'javascript'}');

        $.post('clientarea.php?action=productdetails&id={$serviceid}&json=1', $.param(data), function (ret) {
            var payload;
            try {
                payload = typeof ret === 'object' ? ret : JSON.parse(String(ret).replace('<JSONRESPONSE#', '').replace('#ENDJSONRESPONSE>', ''));
            } catch (e) {
                fail('{$text->t('smimeErrorOccurred')|escape:'javascript'}');
                return;
            }
            if (payload.result === 'error') {
                fail(payload.error || '{$text->t('smimeErrorOccurred')|escape:'javascript'}');
                return;
            }
            alerts.html($('<div class="alert alert-success" role="alert"></div>').text((payload.data && payload.data.message) || '{$text->t('smimeOrderedSuccessfully')|escape:'javascript'}'));
            window.setTimeout(function () {
                window.location.href = 'clientarea.php?action=productdetails&id={$serviceid}';
            }, 1200);
        }).fail(function () {
            fail('{$text->t('smimeErrorOccurred')|escape:'javascript'}');
        });
    });
</script>
{/if}
