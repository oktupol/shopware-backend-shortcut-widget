/**
 * Created by Sebastian on 2016-03-21.
 */
/* {namespace name="backend/SebastianWielandShortcutWidget"} */
//{block name="backend/sebastian_wieland_shortcut_widget/view/list/shortcuts"}
Ext.define('Shopware.apps.SebastianWielandShortcutWidget.view.list.Shortcuts', {
    extend: 'Shopware.grid.Panel',
    alias: 'widget.shortcut-widget-shortcut-list-grid',
    region: 'center',

    configure: function () {
        var me = this;

        return {
            detailWindow: 'Shopware.apps.SebastianWielandShortcutWidget.view.detail.Window',

            columns: {
                name: {
                    header: '{s name=view/list/shortcut/name}Name{/s}',
                    flex: 1
                },
                link: {
                    header: '{s name=view/list/shortcut/link}Frontend-Link{/s}',
                    flex: 2
                },
                subApplication: {
                    header: '{s name=view/list/shortcut/sub_application}Backend-SubApplication{/s}',
                    flex: 2
                },
                subApplicationAction: {
                    header: '{s name=view/list/shortcut/action}Action{/s}',
                    flex: 1
                }
            }
        };
    }
});
//{/block}