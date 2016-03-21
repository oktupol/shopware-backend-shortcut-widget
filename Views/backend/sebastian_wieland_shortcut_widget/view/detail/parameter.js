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
//{block name="backend/sebastian_wieland_shortcut_widget/view/detail/Parameter"}
Ext.define('Shopware.apps.SebastianWielandShortcutWidget.view.detail.Parameter', {
    extend: 'Shopware.grid.Panel',
    alias: 'widget.shortcut-widget-parameter-detail-grid',
    title: '{s name=view/detail/parameter/title}Parameter{/s}',
    height: 300,

    configure: function () {
        var me = this;

        return {
            rowEditing: true,
            pagingbar: false,

            columns: {
                name: {
                    header: '{s name=view/detail/parameter/name}Name{/s}',
                    flex: 1
                },
                type: {
                    header: '{s name=view/detail/parameter/type}Wert-Datentyp{/s}',
                    flex: 1,
                    renderer: function (value, meta, record, row, col, store, gridPanel) {
                        switch (value) {
                            case 0:
                                return '{s name=view/detail/parameter/type/boolean}Boolean{/s}';
                            case 1:
                                return '{s name=view/detail/parameter/type/integer}Integer{/s}';
                            case 2:
                                return '{s name=view/detail/parameter/type/float}Float{/s}';
                            case 3:
                                return '{s name=view/detail/parameter/type/string}String{/s}';
                            case 4:
                                return '{s name=view/detail/parameter/type/json}Json{/s}';
                            default:
                                return '{s name=view/detail/parameter/type/unknown}Unbekannt{/s}';
                        }
                    },
                    editor: {
                        xtype: 'combobox',
                        valueField: 'field1',
                        displayField: 'field2',
                        triggerAction: 'all',
                        mode: 'local',
                        store: [
                            [0, '{s name=view/detail/parameter/type/boolean}Boolean{/s}'],
                            [1, '{s name=view/detail/parameter/type/integer}Integer{/s}'],
                            [2, '{s name=view/detail/parameter/type/float}Float{/s}'],
                            [3, '{s name=view/detail/parameter/type/string}String{/s}'],
                            [4, '{s name=view/detail/parameter/type/json}Json{/s}']
                        ],
                        lazyRender: true
                    }
                },
                value: {
                    header: '{s name=view/detail/parameter/value}Wert{/s}',
                    flex: 2
                }
            }
        };
    },

    /**
     * Creates the add button for the grid toolbar.
     *
     * If the configuration { @link #addButton } is set to
     * false this function isn't called.
     *
     * @returns { Ext.button.Button }
     */
    createAddButton: function () {
        var me = this,
            addButton = me.callParent(arguments);

        addButton.handler = function () {
            var newRecord = me.createNewRecord();
            me.store.add(newRecord);
            me.rowEditor.startEdit(newRecord, 0);
        };

        me.addButton = addButton;
        return me.addButton;
    },

    /**
     * Creates the edit action column item of the grid.
     * This column is used to edit a single record in the detail view.
     *
     * If the configuration { @link #editColumn } or { @link #actionColumn } is set to
     * false this function isn't called.
     *
     * @return { Object }
     */
    createEditColumn: function () {
        var me = this,
            editColumn = me.callParent(arguments);

        editColumn.handler = function(view, rowIndex, colIndex, item, opts, record) {
            me.rowEditor.startEdit(record, 0);
        };

        return editColumn;
    }
});
//{/block}