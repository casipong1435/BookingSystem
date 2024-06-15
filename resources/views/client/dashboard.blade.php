@extends('layouts.app')

@section('content')

    @include('partials.client_header')

    @yield('dashboard-content')
    @include('partials.footer')

    <script>
        $(document).ready(function(){
            $('a.item-list').click(function(){
                $('a.item-list').removeClass('active');
                $(this).addClass('active');
            });

            $('.navbar-collapse').on('shown.bs.collapse', function () {
                $('.navbar-collapse').collapse('hide');
            });
            
            $('#navbarDropdown').click(function(){
                if ($('#menu-check').is(':checked')){
                    $('#menu-check').prop('checked', false);
                    $('.dropdown-menu').removeClass('show');
                }else{
                    $('#menu-check').prop('checked', true);
                    $('.dropdown-menu').addClass('show');
                }
            });

            categoryClick('#city-item', '#city-item-list', '#tcgc-item-list');
            categoryClick('#tcgc-item', '#tcgc-item-list', '#city-item-list')

            function categoryClick(btn_id, section_show_id, section_hide_id){
                $(btn_id).click(function(){
                    $(section_hide_id).addClass('d-none');
                    $(section_show_id).removeClass('d-none');
                });
            }

        });
    </script>
@endsection