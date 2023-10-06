@extends('layouts.app')

@section('content')



  <div class="row justify-content-center" style="margin-left: 20%;">
      <div class="container">
          <h1>Edit ticket</h1>
          <form action="/tickets/{{$ticket->ticket_id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
              <div class="form-group">
                  <label for="name">Reporter name</label>
                  <input type="text" id="name" value="{{$ticket->reporter_name}}" name="reporter_name" required>
              </div>
              <div class="form-group">
                  <label for="location">Location</label>
                  <input type="text" id="location" value="{{$ticket->location}}" name="location" required>
              </div>
              <div class="form-group">
                  <label for="password">Mobile no</label>
                  <input type="text" id="mobile_no" value="{{$ticket->mobile_no}}" name="mobile_no" required>
              </div>
              <div class="form-group">
                  <label for="priority">priority</label>n
                  <select id="priority" name="priority">
                      <option value="{{$ticket->priority}}">High</optio>
                      <option value="{{$ticket->priority}}">Medium</option>
                      <option value="{{$ticket->priority}}">Low</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="department">Department:</label>
                <select id="department" name="department">
                    <option value="hr">HR</option>
                    <option value="it">Information Technology</option>
                    <option value="sales">Sales</option>
                </select>
            </div>


            <div class="form-group">
                <label for="subdepartment">Sub-department:</label>
                <select id="subdepartment" name="sub_department">
                    <!--javascript options -->
                </select>
            </div>
              <div class="form-group">
                  <label for="message">Problem</label>
                  <textarea id="message" name="problem" value="{{$ticket->problem}}" required></textarea>
              </div>
              <div class="form-group">
                  <input type="submit" class="btn btn-success" value="Update ticket">
              </div>
          </form>
      </div>


  <script>
        // JavaScript to handle dependent dropdowns
        const departmentDropdown = document.getElementById("department");
        const subdepartmentDropdown = document.getElementById("subdepartment");

        // Define sub-departments for each department
        const subdepartments = {
            hr: ["Recruitmen", "Training", "Employee Relations"],
            it: ["Software Development", "Network Administration", "Database Management","Frontend"],
            sales: ["Department Sales", "Outbound Sales", "Account Management"]
        };

        // Function to populate sub-department dropdown based on the selected department
        function populateSubdepartments() {
            const selectedDepartment = departmentDropdown.value;
            subdepartmentDropdown.innerHTML = "";

            if (selectedDepartment in subdepartments) {
                subdepartments[selectedDepartment].forEach(subdepartment => {
                    const option = document.createElement("option");
                    option.value = subdepartment;
                    option.textContent = subdepartment;
                    subdepartmentDropdown.appendChild(option);
                });
            }
        }

        // Initial population of sub-department dropdown
        populateSubdepartments();

        // Event listener to update sub-department options when department selection changes
        departmentDropdown.addEventListener("change", populateSubdepartments);
    </script>

@endsection
