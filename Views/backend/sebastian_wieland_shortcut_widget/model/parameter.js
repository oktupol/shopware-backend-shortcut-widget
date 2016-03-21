/**
 * Created by Sebastian on 2016-03-21.
 */
//{block name="backend/sebastian_wieland_shortcut_widget/model/parameter"}
Ext.define('Shopware.apps.SebastianWielandShortcutWidget.model.Parameter', {
    extend: 'Shopware.data.Model',

    configure: function () {
        var me = this;

        return {
            listing: 'Shopware.apps.SebastianWielandShortcutWidget.view.detail.Parameter'
        }
    },

    fields: [
        //{block name="backend/sebastian_wieland_shortcut_widget/model/parameter/fields"}{/block}
        { name: 'id', type: 'int', useNull: true },
        { name: 'name', type: 'string' },
        { name: 'type', type: 'int', defaultValue: 3 },
        { name: 'value', type: 'string' },
        { name: 'shortcutId', type: 'int' }
    ]
});
//{/block}