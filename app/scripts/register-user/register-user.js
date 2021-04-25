
(function($, $sl) {
    const appName = 'registerUser';
    $sl.apps.register = $sl.apps.register || {};
    let pb = $sl.apps.register.user = () => {
        main.init();
        main.attachListeners();
    };
    let main = {};
    main.$container = (query) => {
        let $el = $(`[name="${appName}"]`);
        return query ? $el.find(query) : $el;
    };
    main.init = function() {
        main.$container('[name="personal-data"]').addClass('active');
        main.$container('[name="personal-data-info"]').css({ 'display': 'flex' });
    };
    main.attachListeners = function() {
        const suffix = `.sl.${appName}`;

        main.$container().off(suffix);
        main.$container().on(`click${suffix}`, '[name=personal-data]', main.onClickPersonalData);
        main.$container().on(`click${suffix}`, '[name=address]', main.onClickAddress);
    };
    main.onClickPersonalData = () => {
        main.onClickRemoveCss();
        main.onClickHideDiv();
        main.$container('[name="personal-data"]').addClass('active');
        main.$container('[name="personal-data-info"]').css({ 'display': 'flex' });
    }
    main.onClickAddress = () => {
        main.onClickRemoveCss();
        main.onClickHideDiv();
        main.$container('.form').addClass('extendForm');
        main.$container('[name="address"]').addClass('active');
        main.$container('[name="address-info"]').css({ 'display': 'flex' });
    }
    main.onClickRemoveCss = function() {
        main.$container('.form').removeClass('extendForm');
        main.$container('.tablinks').removeClass('active');
    }
    main.onClickHideDiv = function() {
        main.$container('.template').hide();
    }
    $(document).ready(pb);
})(window.jQuery, $sl);