<?php
/**
 * @var \App\Models\staff[] staff
 */
?>
@if(isset($staff) and sizeof($staff))
    @foreach ($staff as $element)
        <li class="dd-item dd3-item" data-id="{{ $element->id }}">
            <div title="Переместить строку" class="dd-handle dd3-handle">Drag</div>
            <div class="dd3-content">
                <table style="width: 100%;">
                    <tr>
                        <td class="column-drag" width="1%"></td>
                        <td valign="top" class="pagename-column" width="20%">
                            <div class="clearFix">
                                <div class="pull-left">
                                    <div class="overflow-20">
                                        <a class="pageLinkEdit"
                                           href="{{ route('admin.staff-directors.edit', ['staff' => $element->id]) }}">
                                            <img src="{{ $element->showImage('icon') }}" alt="{{ $element->alt }}"
                                                 title="{{ $element->title }}" style="max-height:20px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td width="20%">
                            <a class="pageLinkEdit" href="{{ route('admin.staff-directors.edit', ['staff' => $element->id]) }}">
                                <p>{{$element->name}}</p>
                            </a>
                        </td>
                        {{--<td width="20%">
                            <p>{{$element->email}}</p>
                        </td>--}}
                        <td width="10%" valign="top" class="icon-column status-column">
                            @widget('status', ['status' => $element->status, 'table' => 'staff', 'id' => $element->id])
                        </td>
                        <td class="nav-column icon-column" valign="top" width="10%">
                            @widget('listButtons', ['routeBase' => 'staff-directors.', 'id' => $element->id, 'view' => false])
                        </td>
                    </tr>
                </table>
            </div>
        </li>
    @endforeach
@endif