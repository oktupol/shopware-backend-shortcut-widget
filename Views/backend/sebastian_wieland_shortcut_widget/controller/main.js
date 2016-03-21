/**
 * Created by Sebastian on 2016-03-21.
 */
//{block name="backend/sebastian_wieland_shortcut_widget/controller/main"}
Ext.define('Shopware.apps.SebastianWielandShortcutWidget.controller.Main', {
    extend: 'Enlight.app.Controller',

    init: function () {
        var me = this;

        me.mainWindow = me.getView('list.Window').create({});
        me.mainWindow.show();

        me.callParent(arguments);
    }
});
//{/block}