
<?php 
    $row = \config('hemmy_role_manager.view.role.row');
    $card_column = \config('hemmy_role_manager.view.role.card_column');
    $card = \config('hemmy_role_manager.view.role.card');
    $card_body = \config('hemmy_role_manager.view.role.card_body');
    $card_body_row_column = \config('hemmy_role_manager.view.role.card_body_row_column');
    $card_body_single_role_column = \config('hemmy_role_manager.view.role.card_body_single_role_column');
?>

<div class="{{$row}}">
    <div class="{{$card_column}}">
        <div class="{{$card}}">
            <div class="{{$card_body}}">
                <?php foreach($modelRoles as $role => $rValue){ ?>
                        <div class="{{$row}}" style="margin-top:8px">
                            <div class="{{$card_body_row_column}}"><strong> {{ $role }} </strong></div>
                                <?php foreach($rValue as $key => $value){ ?>
                                    <div class="{{$card_body_single_role_column}}">
                                        <?php
                                            $array_value = explode('-',$key);
                                            if($value == 1){
                                                $checked = 'checked';
                                                $value = 0;
                                            }else{
                                                $checked = '';
                                                $value = 1;
                                            }
                                        ?>
                                        <input type="checkbox" onclick="setUserRole('{{$value}}','{{$key}}')" <?=$checked;?> value="{{ $key }}" name="{{ $key }}" id="{{ $key }}"> {{ $array_value[0] }}
                                    </div>
                                <?php } ?>
                        </div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>