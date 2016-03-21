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