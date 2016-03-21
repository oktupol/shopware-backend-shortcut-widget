/**
 * Created by Sebastian on 2016-03-21.
 */
/* {namespace name="backend/SebastianWielandShortcutWidget"} */
//{block name="backend/index/sebastian_wieland_shortcut_widget/view/main"}
Ext.define('Shopware.apps.Index.sebastianWielandShortcutWidget.view.Main', {
    extend: 'Shopware.apps.Index.view.widgets.Base',
    alias: 'widget.sebastian-wieland-shortcut',
    title: '{s name=widget/view/main/title}Shortcuts{/s}',

    resizable: {
        handles: 's'
    },

    minHeight: 120,
    maxHeight: 600,

    initComponent: function () {
        var me = this;

        me.shortcutStore = Ext.create('Shopware.apps.Index.sebastianWielandShortcutWidget.store.Shortcut');

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
            columns: me.createColumns()
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
                        iconCls: 'sprite-globe',
                        tooltip: '{s name=widget/view/main/open_link}Im Frontend öffnen{/s}',
                        handler: function (view, rowIndex, colIndex, item, event, record) {
                            var link = record.get('link').trim();
                            if ('' != link) {
                                window.open(link);
                            }
                        }
                    }, {
                        iconCls: 'sprite-application',
                        tooltip: '{s name=widget/view/main/open_backend}Im Backend öffnen{/s}',
                        handler: function (view, rowIndex, colIndex, item, event, record) {
                            var subApplicationName = record.get('subApplication').trim(),
                                subApplicationAction = record.get('subApplicationAction').trim();

                            if ('' != subApplicationName && '' != subApplicationAction) {
                                var subApplicationOptions = {
                                    name: subApplicationName,
                                    action: subApplicationAction,
                                    params: {}
                                };

                                var parameters = record.getAssociatedData().parameters;

                                for (var parameterIndex in parameters) {
                                    if (parameters.hasOwnProperty(parameterIndex)) {
                                        var parameter = parameters[parameterIndex],
                                            value = parameter.value;

                                        switch (parameter.type) {
                                            case 0:
                                                value = 'true' == parameter.value.toLowerCase();
                                                break;
                                            case 1:
                                            case 2:
                                                value = Number(parameter.value);
                                                break;
                                            case 4:
                                                value = JSON.parse(parameter.value);
                                                break;
                                            default:
                                                break;
                                        }

                                        subApplicationOptions.params[parameter.name] = value;
                                    }
                                }

                                Shopware.app.Application.addSubApplication(subApplicationOptions);
                            }
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

        me.shortcutStore.reload();
    }
});
//{/block}