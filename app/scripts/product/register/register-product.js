(function ($, $sl) {
    const appName = 'registerProduct';
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
    main.init = function () { };
    main.attachListeners = function () {
        const suffix = `.sl.${appName}`;

        main.$container().off(suffix);
        main.$container().on(`change${suffix}`, '[name=picture]', main.onChangeHandleFileSelect);
        main.$container().on(`click${suffix}`, '[name=remove-picture]', main.onClickRemoveImage);
    };
    main.onChangeHandleFileSelect = () => {
        let reader = new FileReader();
        reader.readAsDataURL((main.$container('[name="picture"]').prop('files'))[0]);
        reader.onload = async () => {
            main.$container('[name="icon"]').hide();
            main.$container('[name="picture"]').hide();
            main.$container('[name="remove-picture"]').show();
            main.$container('[name="image-product"]').css('display', 'flex')
            main.$container('[name="image-product"]').css('background-image', `url(${reader.result.toString()})`)
        }
    }
    main.onClickRemoveImage = function () {
        main.$container('[name="image-product"]').css('display', 'none')
        main.$container('[name="image-product"]').css('background-image', 'url()')
        main.$container('[name="icon"]').show();
        main.$container('[name="picture"]').show();
        main.$container('[name="remove-picture"]').hide();
    }
    $(document).ready(pb);
})(window.jQuery, $sl);