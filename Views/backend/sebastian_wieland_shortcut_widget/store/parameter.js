/**
 * Created by Sebastian on 2016-03-21.
 */
//{block name="backend/sebastian_wieland_shortcut_widget/store/parameter"}
Ext.define('Shopware.apps.SebastianWielandShortcutWidget.store.Parameter', {
    extend: 'Shopware.store.Association',
    model: 'Shopware.apps.SebastianWielandShortcutWidget.model.Parameter',
    configure: function () {
        return {
            controller: 'SebastianWielandShortcutWidget'
        };
    }
});
//{/block}