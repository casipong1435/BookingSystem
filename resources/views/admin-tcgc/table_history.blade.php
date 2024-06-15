@extends('admin-tcgc.dashboard')

@section('page-title', 'Reservation History')

@section('dashboard-content')
<div class="container">
    <h3 class="fw-bold">Reservation History</h3>
    <div class="row">
        <div class="table-holder">
            <table cellpadding="5">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Purpose</th>
                <th>Start</th>
                <th>End</th>
            </thead>
            <tbody>
                <?php

                $i = 0;
                    while ($i<5){
                ?>
                    <tr class="py-1" id="table-data">
                        <td data-label="#">{{ $i }}</td>
                        <td data-label="Name">Christopher Casipong</td>
                        <td data-label="Address">Maloro, Tangub City</td>
                        <td data-label="Purpose">For Birthday Celebration</td>
                        <td data-label="Start">12-5-2023</td>
                        <td data-label="End">12-5-2023</td>
                    </tr>
                <?php $i++; }?>
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection