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
//{block name="backend/sebastian_wieland_shortcut_widget/application"}
Ext.define('Shopware.apps.SebastianWielandShortcutWidget', {
    name: 'Shopware.apps.SebastianWielandShortcutWidget',
    extend: 'Enlight.app.SubApplication',
    loadPath: '{url action=load}',
    bulkLoad: true,

    controllers: [
        'Main'
    ],

    models: [
        'Shortcut',
        'Parameter'
    ],

    stores: [
        'Shortcut',
        'Parameter'
    ],

    views: [
        'list.Window',
        'list.Shortcuts',
        'detail.Window',
        'detail.Shortcut',
        'detail.Parameter'
    ],

    launch: function () {
        return this.getController('Main').mainWindow;
    }
});
//{/block}