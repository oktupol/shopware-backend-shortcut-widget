/**
 * Created by Sebastian on 2016-03-21.
 */
//{block name="backend/index/sebastian_wieland_shortcut_widget/model/parameter"}
Ext.define('Shopware.apps.Index.sebastianWielandShortcutWidget.model.Parameter', {
    extend: 'Ext.data.Model',

    fields: [
        { name: 'id', type: 'int' },
        { name: 'name', type: 'string' },
        { name: 'type', type: 'int' },
        { name: 'value', type: 'string' },
        { name: 'shortcutId', type: 'int' }
    ]
})
;
//{/block}