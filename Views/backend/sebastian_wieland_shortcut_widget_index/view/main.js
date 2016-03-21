/**
 * Created by Sebastian on 2016-03-21.
 */
/* {namespace name="backend/SebastianWielandShortcutWidget"} */
//{block name="backend/sebastian_wieland_shortcut_widget_index/view/main"}
Ext.define('Shopware.apps.SebastianWielandShortcutWidgetIndex.view.Main', {
    extend: 'Shopware.apps.Index.view.widgets.Base',
    alias: 'widget.sebastian-wieland-shortcut',

    resizable: {
        handles: 's'
    },

    minHeight: 250,
    maxHeight: 600,

    initComponent: function () {
        var me = this;

        me.shortcutStore = Ext.create('Shopware.apps.SebastianWielandShortcutWidgetIndex.store.Shortcut');

        me.tools = [{
            type: 'refresh',
            scope: me,
            handler: me.refreshView
        }];

        me.items = [
            me.createShortcutGrid()
        ];

        me.callParent(arguments);
    },

    createShortcutGrid: function () {
        var me = this;

        return Ext.create('Ext.grid.Panel', {
            border: 0,
            store: me.shortcutStore,
            columns: me.createColumns(),
            bbar: {
                xtype: 'pagingtoolbar',
                displayInfo: true,
                store: me.shortcutStore
            }
        });
    },

    createColumns: function () {
        var me = this;

        return [
            {
                dataIndex: 'name',
                header: '{s name=widget/view/main/name}Name{/s}',
                flex: 1
            }, {
                xtype: 'actioncolumn',
                width: 50,
                items: [
                    {
                        iconCls: 'sprite-user--arrow',
                        tooltip: '{s name=widget/view/main/open_link}Im Frontend öffnen{/s}',
                        handler: function (view, rowIndex, colIndex, item, event, record) {
                            console.log(record);
                        }
                    }, {
                        iconCls: 'sprite-user--arrow',
                        tooltip: '{s name=widget/view/main/open_link}Im Backend öffnen{/s}',
                        handler: function (view, rowIndex, colIndex, item, event, record) {
                            console.log(record);
                        }
                    }
                ]
            }
        ]
    },

    refreshView: function () {
        var me = this;

        if (!me.shortcutStore) {
            return;
        }

        me.accountStore.reload();
    }
});
//{/block}