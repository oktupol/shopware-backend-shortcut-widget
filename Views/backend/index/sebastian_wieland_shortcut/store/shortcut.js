/**
 * Created by Sebastian on 2016-03-21.
 */
//{block name="backend/index/sebastian_wieland_shortcut_widget/store/shortcut"}
Ext.define('Shopware.apps.Index.sebastianWielandShortcutWidget.store.Shortcut', {
    extend: 'Ext.data.Store',

    model: 'Shopware.apps.Index.sebastianWielandShortcutWidget.model.Shortcut',

    remoteSort: true,

    pageSize: 25,

    autoLoad: true,

    proxy: {
        type: 'ajax',
        url: '{url controller="SebastianWielandShortcutWidget" action="list"}',

        reader: {
            type: 'json',
            root: 'data',
            totalProperty: 'total'
        }
    }
});
//{/block}