{* Wizard page 1 "Welcome": what the module does. $intro and the texts with <b> are the module's own HTML. *}
<span>{$intro nofilter}<br><br></span>
<span>{t key='step1.second_p'}<br><br></span>
<span class="ggs-html">
    <div class="ggs-features">
        {foreach [1, 2, 3] as $number}
            <div class="ggs-feature">
                <div class="ggs-feature__title">{t key="step1.feature{$number}_title"}</div>
                <div class="ggs-feature__desc">{t key="step1.feature{$number}_desc"}</div>
            </div>
        {/foreach}
    </div>
</span>
<span>{t key='step1.third_p' html=true}</span>
<div class="mod-row"></div>
<a class="mod-btn mod-btn--success mt30_custom" href="{$next}"><span class="mod-btn-text">{t key='step1.next_step_btn'}</span></a>
