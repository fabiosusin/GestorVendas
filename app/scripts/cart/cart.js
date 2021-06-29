(function($, $sl) {
    const appName = 'cart';
    $sl.apps.register = $sl.apps.register || {};
    const pb = $sl.apps.register.product = () => {
        main.plotItems();
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
        main.$container().on(`click${suffix}`, '[name=clear-cart]', main.onClickClearCart);
    };
    main.plotItems = () => {
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: '../../pages/cart/cart-items.php',
            data: { ids: JSON.parse(localStorage.getItem('productsId')) },
            success: function(msg) {
                main.$container("[name=products]").html(msg);
            }
        });
    }
    main.onClickClearCart = function() {
        localStorage.removeItem('productsId');
        main.plotItems();
    }
    $(document).ready(pb);
})(window.jQuery, $sl);