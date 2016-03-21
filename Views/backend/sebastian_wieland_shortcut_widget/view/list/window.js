/**
 * Created by Sebastian on 2016-03-21.
 */
/* {namespace name="backend/SebastianWielandShortcutWidget"} */
//{block name="backend/sebastian_wieland_shortcut_widget/view/list/window"}
Ext.define('Shopware.apps.SebastianWielandShortcutWidget.view.list.Window', {
    extend: 'Shopware.window.Listing',
    alias: 'widget.shortcut-widget-shortcut-list-window',
    height: 450,
    width: 800,
    title: '{s name=view/list/window/title}Shortcuts{/s}',
    configure: function() {
        return {
            listingGrid: 'Shopware.apps.SebastianWielandShortcutWidget.view.list.Shortcuts',
            listingStore: 'Shopware.apps.SebastianWielandShortcutWidget.store.Shortcut'
        };
    }
});
//{/block}