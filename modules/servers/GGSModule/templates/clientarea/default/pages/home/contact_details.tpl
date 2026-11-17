<div class="validate-ssl-unified ggs-cert ggs-contacts">
    {foreach $contacts as $contact}
        <section class="ggs-card">
            <h4 class="ggs-card__title">
                <svg class="ggs-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                {$contact.title|escape}
            </h4>
            <dl class="ggs-dl">
                {foreach $contact.fields as $field => $value}
                    <dt>{$field|escape}</dt><dd>{$value|escape}</dd>
                {/foreach}
            </dl>
        </section>
    {foreachelse}
        <section class="ggs-card">
            <p class="ggs-note ggs-note--plain">-</p>
        </section>
    {/foreach}

    <div class="ggs-actions">
        <a class="ggs-btn" href="clientarea.php?action=productdetails&amp;id={$serviceid}">
            <svg class="ggs-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
            {$LANG.clientareabacklink|default:'Back'}
        </a>
    </div>
</div>
