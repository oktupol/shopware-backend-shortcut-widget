/**
 * Created by Sebastian on 2016-03-21.
 */
//{block name="backend/index/sebastian_wieland_shortcut_widget/model/shortcut"}
Ext.define('Shopware.apps.Index.sebastianWielandShortcutWidget.model.Shortcut', {
    extend: 'Ext.data.Model',

    fields: [
        { name: 'id', type: 'integer' },
        { name: 'name', type: 'string' },
        { name: 'link', type: 'string' },
        { name: 'subApplication', type: 'string' },
        { name: 'subApplicationAction', type: 'string' }
    ],

    hasMany: [
        {
            name: 'parameters',
            model: 'Shopware.apps.Index.sebastianWielandShortcutWidget.model.Parameter',
            associationKey: 'parameters'
        }
    ]
});
//{/block}