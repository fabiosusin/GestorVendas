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
        main.$container().on(`click${suffix}`, '[name=remove-product]', main.onClickRemoveProduct);
        main.$container().on(`click${suffix}`, '[name=finalize-sale]', main.onClickSaveSale);
        main.$container().on(`change${suffix}`, '[name=quantity]', main.onChangeAmount);
    };
    main.plotItems = () => {
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: '../../pages/cart/cart-items.php',
            data: { ids: JSON.parse(localStorage.getItem('productsId')) },
            success: function(msg) {
                main.$container("[name=products]").html(msg);
                main.plotTotal();
            }
        });
    }
    main.onChangeAmount = function() {
        const quantity = +($(this).closest('[name=quantity]').val());
        if (!quantity || Number.isNaN(quantity))
            return;
        const unitPrice = main.textToNumber($(this).parent().parent().parent().find('[name="price"]').text())
        $(this).parent().parent().parent().find('[name="total-price"]').text((quantity * unitPrice).money());
        main.plotTotal()
    }
    main.onClickClearCart = function() {
        localStorage.removeItem('productsId');
        main.plotItems();
    }
    main.getProducts = () => {
        const ids = main.$container('[name=productId]');
        const quantities = main.$container('[name=quantity]');

        let idx = 0;
        let id = ids[idx];
        let quantity = quantities[idx];

        const data = [];
        while (id) {
            ++idx;
            data.push({ id: +id.value, quantity: +quantity.value });

            id = ids[idx];
            quantity = quantities[idx];
        }

        return data;
    }
    main.plotTotal = function(infos) {
        const data = main.getProducts();

        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: '../../pages/cart/cart-total.php',
            data: { data: JSON.stringify(data) },
            success: function(total) {
                total = +total;
                if (!total || Number.isNaN(total))
                    return;

                let showMessage = 'none'
                let spanClass = '';
                let message = '';
                if (infos) {
                    showMessage = 'block';
                    spanClass = infos.spanClass;
                    message = infos.message;
                }

                const html = main.totalTemplate.replace(/{{showMessage}}/gi, showMessage)
                    .replace(/{{spanClass}}/gi, spanClass)
                    .replace(/{{message}}/gi, message)
                    .replace(/{{subTotal}}/gi, total.money())
                    .replace(/{{total}}/gi, total.money())
                main.$container("[name=total-price-infos]").html(html);
            }
        });
    }
    main.textToNumber = (val) => {
        if (!val)
            return 0;
        return +val.replace('R$', '').replace(',', '.');
    }
    main.onClickRemoveProduct = function() {
        const id = $(this).parent().parent().find('[name="productId"]').val();
        let ids = JSON.parse(localStorage.getItem('productsId'));
        if (!id || !ids)
            return;

        ids = ids.filter(x => x != id);
        localStorage.setItem('productsId', JSON.stringify(ids))
        main.plotItems();
    }
    main.onClickSaveSale = function() {
        const data = main.getProducts();

        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: '../../pages/cart/cart-validate.php',
            data: { data: JSON.stringify(data) },
            success: function(msg) {
                if (msg)
                    main.plotTotal({ spanClass: 'error', message: msg });
                else
                    main.createSale();
            }
        });
    }
    main.createSale = () => {
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: '../../pages/cart/create-sale.php',
            success: function() {
                window.location.href = path;
            }
        });
    }
    main.totalTemplate = `
    <div class="message" style="display: {{showMessage}}">
      <span class="{{spanClass}}">{{message}}</span>
    </div>
    <div class="infos">
    <div class="sub-total">
      <span class="left">SubTotal</span>
      <span class="right">{{subTotal}}</span>
    </div>
    <div class="sub-total">
      <span class="left">Total</span>
      <span class="right">{{total}}</span>
    </div>
    <button class="col-md-12 default-button" name="finalize-sale">Finalizar Compra</button>
  </div>`
    $(document).ready(pb);
})(window.jQuery, $sl);