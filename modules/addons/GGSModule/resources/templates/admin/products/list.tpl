{*
    The products list as every change puts it back into #ggs-products: the message of the last action, the two
    filters (imported or not, validation level; each button shows how many products it would list), the table.
*}
{include file='admin/partials/flash.tpl'}

<span class="ggs-html">
    <div class="ggs-filters">
        {foreach $filters as $filter}
            <div class="ggs-show" role="group" aria-label="{$filter.label}">
                {foreach $filter.choices as $choice}
                    <a class="mod-btn mod-btn--sm {if $choice.current}mod-btn--primary{else}mod-btn--default mod-btn--outline{/if}" href="{$choice.url}"
                       hx-get="{$choice.url}" hx-target="#ggs-products" hx-swap="innerHTML" hx-push-url="true"{if $choice.current} aria-current="page"{/if}>{$choice.text} <b>{$choice.count}</b></a>
                {/foreach}
            </div>
        {/foreach}
    </div>
</span>

{include file='admin/partials/table.tpl'}
