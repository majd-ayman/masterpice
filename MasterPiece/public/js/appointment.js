// document.getElementById('clinic_id').addEventListener('change', function() {
//     var clinicId = this.value;
//     console.log(clinicId);

//     if (clinicId) {
//         fetch(`/get-doctors/${clinicId}`)
//             .then(response => response.json())
//             .then(data => {
//                 var doctorSelect = document.getElementById('doctor_id');
//                 doctorSelect.innerHTML = '<option value="">Select Doctor</option>';

//                 data.forEach(function(doctor) {
//                     var option = document.createElement('option');
//                     option.value = doctor.id;
//                     option.textContent = doctor.name;
//                     doctorSelect.appendChild(option);
//                 });
//             });
//     } else {
//         document.getElementById('doctor_id').innerHTML = '<option value="">Select Doctor</option>';
//     }
// });

// document.getElementById('doctor_id').addEventListener('change', function() {
//     var doctorId = this.value;
//     document.getElementById('doctor_id_hidden').value = doctorId;
//     console.log(doctorId);
//     fetchAvailableTimes();
// });

// document.getElementById('appointment_date').addEventListener('change', function() {
//     fetchAvailableTimes();
// });
// document.getElementById('doctor_id').addEventListener('change', function() {
//     fetchAvailableTimes();
// });

// document.getElementById('appointment_date').addEventListener('change', function() {
//     fetchAvailableTimes();
// });

// function fetchAvailableTimes() {
//     var doctorId = document.getElementById('doctor_id').value;
//     var appointmentDate = document.getElementById('appointment_date').value;

//     // التأكد من أن الطبيب والتاريخ تم اختيارهما
//     if (doctorId && appointmentDate) {
//         $.ajax({
//             url: `/get-available-times/${doctorId}/${appointmentDate}`,
//             method: 'GET',
//             success: function(response) {
//                 var timeSlotsDropdown = document.getElementById('time_slots');
//                 timeSlotsDropdown.innerHTML = '<option value="">Select Time</option>';
//                 console.log(response);
//                 // إضافة الأوقات المتاحة إلى القائمة المنسدلة
//                 if (response.length > 0) {
//                     response.forEach(function(time) {
//                         var option = document.createElement('option');
//                         option.value = time;
//                         option.textContent = time;
//                         timeSlotsDropdown.appendChild(option);
//                     });
//                 } else {
//                     timeSlotsDropdown.innerHTML = '<option value="">No available times</option>';
//                 }
//             },
//             error: function() {
//                 alert('An error occurred while fetching available times');
//             }
//         });
//     }
// }
// console.log("hi");

document.getElementById('clinic_id').addEventListener('change', function() {
    var clinicId = this.value;
    console.log(clinicId);

    if (clinicId) {
        fetch(`/get-doctors/${clinicId}`)
            .then(response => response.json())
            .then(data => {
                var doctorSelect = document.getElementById('doctor_id');
                doctorSelect.innerHTML = '<option value="">Select Doctor</option>';

                data.forEach(function(doctor) {
                    var option = document.createElement('option');
                    option.value = doctor.id;
                    option.textContent = doctor.name;
                    doctorSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching doctors:', error);
            });
    } else {
        document.getElementById('doctor_id').innerHTML = '<option value="">Select Doctor</option>';
    }
});

document.getElementById('doctor_id').addEventListener('change', function() {
    var doctorId = this.value;
    document.getElementById('doctor_id_hidden').value = doctorId;
    console.log(doctorId);
    fetchAvailableTimes();
});

document.getElementById('appointment_date').addEventListener('change', function() {
    fetchAvailableTimes();
});

function fetchAvailableTimes() {
    var doctorId = document.getElementById('doctor_id').value;
    var appointmentDate = document.getElementById('appointment_date').value;

    if (doctorId && appointmentDate) {
        fetch(`/get-available-times/${doctorId}/${appointmentDate}`)
            .then(response => response.json())
            .then(data => {
                var timeSlotsDropdown = document.getElementById('time_slots');
                timeSlotsDropdown.innerHTML = '<option value="">Select Time</option>';

                if (data.length > 0) {
                    data.forEach(function(time) {
                        var option = document.createElement('option');
                        option.value = time;
                        option.textContent = time;
                        timeSlotsDropdown.appendChild(option);
                    });
                } else {
                    timeSlotsDropdown.innerHTML = '<option value="">No available times</option>';
                }
            })
            .catch(error => {
                console.error('Error fetching available times:', error);
                alert('An error occurred while fetching available times');
            });
    }
}

console.log("hi");