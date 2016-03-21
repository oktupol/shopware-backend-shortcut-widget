/**
 * Shopware Backend Shortcut Widget
 * Copyright (C) 2016  Sebastian Wieland
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Created by Sebastian Wieland <sebasti@nwie.land> on 2016-03-21.
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
        { name: 'subApplication', type: 'string' },
        { name: 'subApplicationAction', type: 'string' }
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