{if $allOk === true}
<div class="validate-ssl-unified ggs-cert ggs-smime">

    <section class="ggs-card ggs-hero ggs-hero--wait">
        <div class="ggs-hero__head">
            <span class="ggs-hero__icon">
                <svg class="ggs-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="m18 16 4-4-4-4M6 8l-4 4 4 4M14.5 4l-5 16"/></svg>
            </span>
            <div class="ggs-hero__title">
                <span class="ggs-badge ggs-badge--wait">{$text->t('smimeAwaitingOrder')}</span>
                <h3>{$productName|escape}</h3>
                <p class="ggs-hero__domain">{if $dsRenewal}{$text->t('dsRenewalIntro')}{else}{$text->t('dsConfigurationIntro')}{/if}</p>
                {if $dsCurrentValidTill}<p class="ggs-hero__domain">{$text->t('smimeCurrentValid')|sprintf:$dsCurrentValidTill}</p>{/if}
            </div>
        </div>
    </section>

    <div id="ggs-ds-alerts">
        {if $dsError}<div class="alert alert-danger" role="alert">{$dsError}</div>{/if}
    </div>

    {if !$dsError}
    <form id="ggs-ds-form" autocomplete="off" onsubmit="return false;" novalidate>

        {* ---------- Delivery ---------- *}
        <section class="ggs-card">
            <h4 class="ggs-card__title">
                <svg class="ggs-ic" viewBox="0 0 24 24" aria-hidden="true"><rect width="20" height="12" x="2" y="6" rx="2"/><path d="M12 12h.01M17 12h.01M7 12h.01"/></svg>
                {$text->t('dsDeliverySection')}
            </h4>
            <div class="ggs-form">
                    {if $dsRenewal}<p class="ggs-note ggs-note--plain">{$text->t('dsRenewalInfo')}</p>{/if}
                    <div class="ggs-field">
                        <label>{$text->t('dsDeliveryLabel')} <span class="ggs-req">*</span></label>
                        {foreach from=$dsMethods key=method item=label name=methods}
                            <label class="ggs-check">
                                <input type="radio" name="ds_method" value="{$method|escape:'htmlall'}" required{if ($dsPreviousMethod && $method == $dsPreviousMethod) || (!$dsPreviousMethod && $smarty.foreach.methods.first)} checked{/if}>
                                <span>{$label}</span>
                            </label>
                        {/foreach}
                    </div>

                <div class="ggs-field" data-ggs-ds-for="ship-token">
                    <p class="ggs-note">{$text->t('dsShipTokenHint')}</p>
                    {if $dsShippingOptions|@count > 1}
                        <label for="ggs-ds-shipping">{$text->t('dsShippingLabel')} <span class="ggs-req">*</span></label>
                        <select id="ggs-ds-shipping" name="ds_shipping" class="form-control">
                            {foreach from=$dsShippingOptions item=option}<option value="{$option.id|escape:'htmlall'}">{$option.label|escape}</option>{/foreach}
                        </select>
                    {else}
                        <input type="hidden" name="ds_shipping" value="{if $dsShippingOptions}{$dsShippingOptions[0].id|escape:'htmlall'}{else}STANDARD{/if}">
                    {/if}
                </div>
                <div class="ggs-field" data-ggs-ds-for="existing-token">
                    <label for="ggs-ds-model">{$text->t('dsTokenModelLabel')} <span class="ggs-req">*</span></label>
                    <select id="ggs-ds-model" name="ds_model" class="form-control">
                        <option value="">-</option>
                        {foreach from=$dsModels key=code item=name}<option value="{$code|escape:'htmlall'}">{$name|escape}</option>{/foreach}
                    </select>
                    <small>{$text->t('dsTokenModelHint')}</small>
                </div>
            </div>
        </section>

        {* ---------- Organization ---------- *}
        <section class="ggs-card">
            <h4 class="ggs-card__title">
                <svg class="ggs-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2M10 6h4M10 10h4M10 14h4M10 18h4"/></svg>
                {$text->t('dsOrganizationSection')}
            </h4>
            <div class="ggs-form">
                <p class="ggs-note ggs-note--plain">{$text->t('dsOrganizationHint')}</p>
                <div class="ggs-fields">
                    <div class="ggs-field"><label for="ggs-ds-org-name">{$text->t('dsOrg_name')} <span class="ggs-req">*</span></label><input type="text" id="ggs-ds-org-name" name="org[name]" class="form-control" required value="{$smimeClient.companyname|escape:'htmlall'}"></div>
                    <div class="ggs-field"><label for="ggs-ds-org-phone">{$text->t('dsOrg_phone')} <span class="ggs-req">*</span></label><input type="text" id="ggs-ds-org-phone" name="org[phone]" class="form-control" required value="{$smimeClient.phonenumber|escape:'htmlall'}"></div>
                    <div class="ggs-field"><label for="ggs-ds-org-address1">{$text->t('dsOrg_address_line_1')} <span class="ggs-req">*</span></label><input type="text" id="ggs-ds-org-address1" name="org[address_line_1]" class="form-control" required value="{$smimeClient.address1|escape:'htmlall'}"></div>
                    <div class="ggs-field"><label for="ggs-ds-org-address2">{$text->t('dsOrg_address_line_2')}</label><input type="text" id="ggs-ds-org-address2" name="org[address_line_2]" class="form-control" value="{$smimeClient.address2|escape:'htmlall'}"></div>
                    <div class="ggs-field"><label for="ggs-ds-org-city">{$text->t('dsOrg_city')} <span class="ggs-req">*</span></label><input type="text" id="ggs-ds-org-city" name="org[city]" class="form-control" required value="{$smimeClient.city|escape:'htmlall'}"></div>
                    <div class="ggs-field"><label for="ggs-ds-org-region">{$text->t('dsOrg_region')} <span class="ggs-req">*</span></label><input type="text" id="ggs-ds-org-region" name="org[region]" class="form-control" required value="{$smimeClient.state|escape:'htmlall'}"></div>
                    <div class="ggs-field"><label for="ggs-ds-org-postal">{$text->t('dsOrg_postal_code')} <span class="ggs-req">*</span></label><input type="text" id="ggs-ds-org-postal" name="org[postal_code]" class="form-control" required value="{$smimeClient.postcode|escape:'htmlall'}"></div>
                    <div class="ggs-field"><label for="ggs-ds-org-country">{$text->t('dsOrg_country')} <span class="ggs-req">*</span></label>
                        {if $smimeCountries}
                            <select id="ggs-ds-org-country" name="org[country]" class="form-control" required>
                                {foreach from=$smimeCountries key=code item=name}<option value="{$code|escape:'htmlall'}"{if $code == $smimeClient.country} selected{/if}>{$name|escape}</option>{/foreach}
                            </select>
                        {else}
                            <input type="text" id="ggs-ds-org-country" name="org[country]" class="form-control" required maxlength="2" value="{$smimeClient.country|escape:'htmlall'}">
                        {/if}
                    </div>
                </div>
            </div>
        </section>

        {* ---------- Administrator ---------- *}
        <section class="ggs-card">
            <h4 class="ggs-card__title">
                <svg class="ggs-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                {$text->t('dsAdministratorSection')}
            </h4>
            <div class="ggs-form">
                <p class="ggs-note ggs-note--plain">{$text->t('dsAdministratorHint')}</p>
                <div class="ggs-fields">
                    <div class="ggs-field"><label for="ggs-ds-admin-first">{$text->t('dsAdmin_first_name')} <span class="ggs-req">*</span></label><input type="text" id="ggs-ds-admin-first" name="admin[first_name]" class="form-control" required value="{$smimeClient.firstname|escape:'htmlall'}"></div>
                    <div class="ggs-field"><label for="ggs-ds-admin-last">{$text->t('dsAdmin_last_name')} <span class="ggs-req">*</span></label><input type="text" id="ggs-ds-admin-last" name="admin[last_name]" class="form-control" required value="{$smimeClient.lastname|escape:'htmlall'}"></div>
                    <div class="ggs-field"><label for="ggs-ds-admin-title">{$text->t('dsAdmin_title')} <span class="ggs-req">*</span></label><input type="text" id="ggs-ds-admin-title" name="admin[title]" class="form-control" required></div>
                    <div class="ggs-field"><label for="ggs-ds-admin-email">{$text->t('dsAdmin_email')} <span class="ggs-req">*</span></label><input type="email" id="ggs-ds-admin-email" name="admin[email]" class="form-control" required value="{$smimeClient.email|escape:'htmlall'}"></div>
                    <div class="ggs-field"><label for="ggs-ds-admin-phone">{$text->t('dsAdmin_phone')} <span class="ggs-req">*</span></label><input type="text" id="ggs-ds-admin-phone" name="admin[phone]" class="form-control" required value="{$smimeClient.phonenumber|escape:'htmlall'}"></div>
                </div>
                <label class="ggs-check">
                    <input type="checkbox" name="admin[same_address]" value="1" checked data-ggs-ds-toggle="admin">
                    <span>{$text->t('dsAdminSameAddress')}</span>
                </label>
                <div class="ggs-fields" data-ggs-ds-address="admin" hidden>
                    <div class="ggs-field"><label>{$text->t('dsAdmin_address_line_1')}</label><input type="text" name="admin[address_line_1]" class="form-control"></div>
                    <div class="ggs-field"><label>{$text->t('dsAdmin_address_line_2')}</label><input type="text" name="admin[address_line_2]" class="form-control"></div>
                    <div class="ggs-field"><label>{$text->t('dsAdmin_city')}</label><input type="text" name="admin[city]" class="form-control"></div>
                    <div class="ggs-field"><label>{$text->t('dsAdmin_region')}</label><input type="text" name="admin[region]" class="form-control"></div>
                    <div class="ggs-field"><label>{$text->t('dsAdmin_postal_code')}</label><input type="text" name="admin[postal_code]" class="form-control"></div>
                    <div class="ggs-field"><label>{$text->t('dsAdmin_country')}</label><input type="text" name="admin[country]" class="form-control" maxlength="2"></div>
                </div>
            </div>
        </section>

        {* ---------- Token shipping address (new token) ---------- *}
        <section class="ggs-card" data-ggs-ds-for="ship-token">
            <h4 class="ggs-card__title">
                <svg class="ggs-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2M15 18H9M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.62l-3.48-4.35A1 1 0 0 0 17.52 8H14"/><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/></svg>
                {$text->t('dsShippingSection')}
            </h4>
            <div class="ggs-form">
                <label class="ggs-check">
                    <input type="checkbox" name="ship[same_address]" value="1" checked data-ggs-ds-toggle="ship">
                    <span>{$text->t('dsShipSameAddress')}</span>
                </label>
                <div class="ggs-fields" data-ggs-ds-address="ship" hidden>
                    <div class="ggs-field"><label>{$text->t('dsShip_first_name')}</label><input type="text" name="ship[first_name]" class="form-control"></div>
                    <div class="ggs-field"><label>{$text->t('dsShip_last_name')}</label><input type="text" name="ship[last_name]" class="form-control"></div>
                    <div class="ggs-field"><label>{$text->t('dsShip_address_line_1')}</label><input type="text" name="ship[address_line_1]" class="form-control"></div>
                    <div class="ggs-field"><label>{$text->t('dsShip_address_line_2')}</label><input type="text" name="ship[address_line_2]" class="form-control"></div>
                    <div class="ggs-field"><label>{$text->t('dsShip_city')}</label><input type="text" name="ship[city]" class="form-control"></div>
                    <div class="ggs-field"><label>{$text->t('dsShip_region')}</label><input type="text" name="ship[region]" class="form-control"></div>
                    <div class="ggs-field"><label>{$text->t('dsShip_postal_code')}</label><input type="text" name="ship[postal_code]" class="form-control"></div>
                    <div class="ggs-field"><label>{$text->t('dsShip_country')}</label><input type="text" name="ship[country]" class="form-control" maxlength="2"></div>
                </div>
            </div>
        </section>

        <p class="ggs-note ggs-note--block">{$text->t('dsValidationInfo')}</p>

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
            <button id="ggs-ds-submit" type="button" class="ggs-btn ggs-btn--primary">
                <svg class="ggs-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
                <span>{$text->t('dsSubmitOrder')}</span>
            </button>
        </div>
    </form>
    {/if}
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
        ggsDsSync();
    });

    // shows the parts of the chosen delivery method and the own-address fields
    function ggsDsSync() {
        var form = $('#ggs-ds-form');
        var method = form.find('[name="ds_method"]:checked').val() || form.find('input[type="hidden"][name="ds_method"]').val() || '';
        form.find('[data-ggs-ds-for]').each(function () {
            var off = $(this).attr('data-ggs-ds-for') !== method;
            $(this).prop('hidden', off).find('[required]').prop('disabled', off);
        });
        form.find('[data-ggs-ds-toggle]').each(function () {
            form.find('[data-ggs-ds-address="' + $(this).attr('data-ggs-ds-toggle') + '"]').prop('hidden', $(this).is(':checked'));
        });
    }
    $(document).on('change', '#ggs-ds-form [name="ds_method"], #ggs-ds-form [data-ggs-ds-toggle]', ggsDsSync);

    $(document).on('click', '#ggs-ds-submit', function () {
        var form   = document.getElementById('ggs-ds-form');
        var alerts = $('#ggs-ds-alerts');
        var btn    = $(this);
        var label  = btn.find('span');
        var text   = label.text();

        alerts.html('');
        if (typeof form.reportValidity === 'function' && !form.reportValidity()) {
            return;
        }

        // only the fields of the chosen delivery and the visible address blocks
        var data = $(form).find(':input').filter(function () {
            return !$(this).closest('[hidden]').length;
        }).serializeArray();
        data.push({ldelim}name: 'mod-action', value: 'createDocumentSigning'{rdelim});
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
            alerts.html($('<div class="alert alert-success" role="alert"></div>').text((payload.data && payload.data.message) || '{$text->t('dsOrderedSuccessfully')|escape:'javascript'}'));
            window.setTimeout(function () {
                window.location.href = 'clientarea.php?action=productdetails&id={$serviceid}';
            }, 1200);
        }).fail(function () {
            fail('{$text->t('smimeErrorOccurred')|escape:'javascript'}');
        });
    });
</script>
{/if}
