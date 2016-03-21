/**
 * Created by Sebastian on 2016-03-21.
 */
//{block name="backend/sebastian_wieland_shortcut_widget/application"}
Ext.define('Shopware.apps.SebastianWielandShortcutWidget', {
    name: 'Shopware.apps.SebastianWielandShortcutWidget',
    extend: 'Enlight.app.SubApplication',
    loadPath: '{url action=load}',
    bulkLoad: true,

    controllers: [
        'Main'
    ],

    models: [
        'Shortcut',
        'Parameter'
    ],

    stores: [
        'Shortcut',
        'Parameter'
    ],

    views: [
        'list.Window',
        'list.Shortcuts',
        'detail.Window',
        'detail.Shortcut',
        'detail.Parameter'
    ],

    launch: function () {
        return this.getController('Main').mainWindow;
    }
});
//{/block}