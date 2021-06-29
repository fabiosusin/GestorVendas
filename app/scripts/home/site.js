(function($, $sl) {
    const appName = 'site';
    $sl.apps.register = $sl.apps.register || {};
    const pb = $sl.apps.register.product = () => {
        main.init();
        main.attachListeners();
    };
    const main = {};
    main.$container = (query) => {
        let $el = $(`[name="${appName}"]`);
        return query ? $el.find(query) : $el;
    };
    main.init = function() {};
    main.attachListeners = function() {
        const suffix = `.sl.${appName}`;

        main.$container().off(suffix);
        main.$container().on(`click${suffix}`, '[name=add-to-cart]', main.onClickAddToCart);
    };
    main.onClickAddToCart = function() {
        const id = $(this).parent().find('[name=productId]').val()
        let ids = JSON.parse(localStorage.getItem('productsId'));
        if (!ids)
            ids = [];
        if (!id || ids.includes(id))
            return;

        ids.push(id);
        localStorage.setItem('productsId', JSON.stringify(ids))
    }
    $(document).ready(pb);
})(window.jQuery, $sl);