<script src="{{asset('js/apiListe.js')}}"></script>
@extends('accueil')
@section('liste')

        <!--<link rel="stylesheet" href="styles/debug.css">-->
    <div class="table-container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr id="list_title">
                    
                </tr>
            </thead>
            <tbody id="list_points">
            </tbody>
        </table>
    </div>
@stop
