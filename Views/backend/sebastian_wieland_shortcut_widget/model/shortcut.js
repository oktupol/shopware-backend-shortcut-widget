/**
 * Created by Sebastian on 2016-03-21.
 */
//{block name="backend/sebastian_wieland_shortcut_widget/model/shortcut"}
Ext.define('Shopware.apps.SebastianWielandShortcutWidget.model.Shortcut', {
    extend: 'Shopware.data.Model',

    configure: function () {
        var me = this;

        return {
            controller: 'SebastianWielandShortcutWidget',
            detail: 'Shopware.apps.SebastianWielandShortcutWidget.view.detail.Shortcut'
        };
    },

    fields: [
        //{block name="backend/sebastian_wieland_shortcut_widget/model/shortcut/fields"}{/block}
        { name: 'id', type: 'int', useNull: true },
        { name: 'name', type: 'string' },
        { name: 'link', type: 'string' },
        { name: 'subApplication', type: 'string' }
    ],

    associations: [
        //{block name="backend/sebastian_wieland_shortcut_widget/model/shortcut/associations"}{/block}
        {
            relation: 'OneToMany',
            storeClass: 'Shopware.apps.SebastianWielandShortcutWidget.store.Parameter',
            lazyLoading: true,

            model: 'Shopware.apps.SebastianWielandShortcutWidget.model.Parameter',
            type: 'hasMany',
            name: 'getParameters',
            associationKey: 'parameters'
        }
    ]
});
//{/block}