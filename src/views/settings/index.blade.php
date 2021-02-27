<?php 
    $layout = \config('hemmy_role_manager.view.layout');
    $display_section = \config('hemmy_role_manager.view.display_section');
    $after_js_section = \config('hemmy_role_manager.view.after_js_section');
?>
@extends($layout)

@section($display_section)
    <div id="roles_display"></div>
@endsection

@section($after_js_section)
        <script type="text/javascript">
            fetchData();
            function setUserRole(value, key){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url : "{{route('hemmy_change_roles')}}",
                    type : "POST",
                    data : {
                                rid : key,
                                status : value,
                                _token : CSRF_TOKEN
                    },
                    success : function(response){
                        fetchData();
                    }
                });
            }

            function fetchData(){
                $.ajax({
                    url : "{{route('hemmy_populate_roles')}}",
                    type : "GET",
                    success : function(response){
                        $("#roles_display").html(response);
                    }
                });
            }
        </script>
@endsection
