/**
 * Created by Sebastian on 2016-03-21.
 */
//{block name="backend/sebastian_wieland_shortcut_widget/store/shortcut"}
Ext.define('Shopware.apps.SebastianWielandShortcutWidget.store.Shortcut', {
    extend: 'Shopware.store.Listing',

    configure: function() {
        var me = this;

        return {
            controller: 'SebastianWielandShortcutWidget'
        };
    },

    model: 'Shopware.apps.SebastianWielandShortcutWidget.model.Shortcut'
});
//{/block}