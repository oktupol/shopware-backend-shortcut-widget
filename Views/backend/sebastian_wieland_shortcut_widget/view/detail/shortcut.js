/**
 * Created by Sebastian on 2016-03-21.
 */
/* {namespace name="backend/SebastianWielandShortcutWidget"} */
//{block name="backend/sebastian_wieland_shortcut_widget/view/detail/shortcut"}
Ext.define('Shopware.apps.SebastianWielandShortcutWidget.view.detail.Shortcut', {
    extend: 'Shopware.model.Container',
    alias: 'widget.shortcut-widget-shortcut-detail-shortcut',

    padding: 20,
    height: 480,

    configure: function () {
        var me = this;

        return {
            controller: 'SebastianWielandShortcutWidget',

            fieldSets: [{
                layout: { type: 'vbox', align: 'stretch' },
                title: '{s name=view/detail/shortcut/title}Shortcut Konfiguration{/s}',

                fields: {
                    name: {
                        fieldLabel: '{s name=view/detail/shortcut/name}Name{/s}'
                    },
                    link: {
                        fieldLabel: '{s name=view/detail/shortcut/link}Frontend-Link{/s}'
                    },
                    subApplication: {
                        fieldLabel: '{s name=view/detail/shortcut/sub_application}Backend-SubApplication{/s}'
                    },
                    action: {
                        fieldLabel: '{s name=view/detail/shortcut/action}Action{/s}'
                    }
                }
            }],

            associations: [
                'parameters'
            ]
        }
    }
});
//{/block}