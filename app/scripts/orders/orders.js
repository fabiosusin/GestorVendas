(function($, $sl) {
    const appName = 'orders';
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
        main.$container().on(`click${suffix}`, '[name=filter]', main.plotItems);
    };
    main.onClickDecrement = () => {
        let page = main.$container('[name=page-number]').val();
        if (--page == 0)
            page = 1;
        main.$container('[name=page-number]').val(page);
    }
    main.onClickIncrement = () => {
        const page = main.$container('[name=page-number]').val();
        main.$container('[name=page-number]').val(page++);
    }
    main.plotItems = () => {
        let page = main.$container('[name=page-number]').val();
        if (typeof page != 'number' || page == 0)
            page = 1;
        const data = {
            pageSize: main.$container('[name=page-size]').val(),
            pageNumber: page,
            client: main.$container('[name=client]').val(),
            saleCode: main.$container('[name=sale-code]').val()
        };

        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: '../../pages/orders/orders-list.php',
            data: { data: JSON.stringify(data) },
            success: function(msg) {
                console.log(msg)
                main.$container("[name=orders]").html(msg);
            }
        });
    }
    $(document).ready(pb);
})(window.jQuery, $sl);