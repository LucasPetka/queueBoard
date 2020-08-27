@extends('layouts.appNoLogin')

@section('content')

<table class="table table-bordered table-striped text-center">
    <thead>
        <tr class="text-uppercase">
            <th>Name</th>
            <th>Status</th>
            <th>Queue</th>
        </tr>
    </thead>
    <tbody id="queueTable"></tbody>
</table>


<script>
    getQueueBoardData();
    setInterval(() =>{
        getQueueBoardData();
    }, 5000);
    
    function getQueueBoardData() {
 
       $.ajax({
          type:'GET',
          url:'/queueboard/data',
          success:function(data) {
            let table = document.getElementById('queueTable');

            table.innerHTML = '';

            data.forEach(specialistRow => {
                let row = document.createElement("tr");

                let cellName = row.insertCell();
                let cellStatus = row.insertCell();
                let cellQueue = row.insertCell();

                cellName.appendChild(document.createTextNode(specialistRow.specialist));

                let specialistState = 0;
                if (specialistRow.current_state === null) {
                    cellStatus.appendChild(document.createTextNode('Specialist cabinet is free'));
                }else{
                    specialistState = 1;
                    cellStatus.appendChild(document.createTextNode(specialistRow.current_state + ' now has an appointment'));
                }

                let queueString = '';

                specialistRow.queue.slice(specialistState,specialistState+5).forEach(function(appointment, i){
                    queueString += appointment.appointment_number;
                    if(i!=specialistRow.queue.slice(specialistState,specialistState+5).length-1){
                        queueString += ', ';
                    }
                });

                cellQueue.appendChild(document.createTextNode(queueString));

                table.appendChild(row);
            });
          }
       });

    }
 </script>
@endsection
