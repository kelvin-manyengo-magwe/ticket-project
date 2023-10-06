@extends('layouts.app')

@section('content')
<style>
body {
  background: #fff;
  font-family: 'PT Sans', sans-serif;
}
a {
  color: #333;
  text-decoration: none;
}
a:hover {
  color: #da5767;
}
.form-control {
  background-color: #f8f9fa;
  padding: 20px;
  padding: 25px 15px;
  margin-bottom: 1.3rem;
}
.form-control:focus {
  color: #000000;
  background-color: #ffffff;
  border: 3px solid #da5767;
  outline: 0;
  box-shadow: none;
}
.btn {
  padding: 0.6rem 1.2rem;
  background: #da5767;
  border: 2px solid #da5767;
}
.btn-primary:hover {
  background-color: #df8c96;
  border-color: #df8c96;
  transition: 0.3s;
}
</style>


<div class="row justify-content-center" style="margin-left: 20%;">
  <div class="col-md-8">

      <div class="card">
        <form id="myForm" class="p-3" action="{{route('tickets.store')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
          @method('post')
          @csrf

            <div class="form">
              <div class="card-title"><h3>Create ticket</h3></div>

                <div class="row">
                  <!--column 1-->

                        <div class="form-group">
                                <label for="name">Reporter name</label>
                                <input type="text" placeholder="Enter name of reporter" id="name" class="form-control" name="reporter_name">
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" id="location" placeholder="Enter location name" class="form-control" name="location">
                            </div>
                            <div class="form-group">
                              <label for="password">Mobile no</label>
                                <input type="text" id="mobile_no" placeholder="Enter mobile no" class="form-control" name="mobile_no">

                            </div>
                            <div class="form-group">
                                <label for="priority">priority</label>
                                <select id="priority" class="form-control" name="priority">
                                    <option value="high"><span class="badge bg-danger">High</span></option>
                                    <option value="medium">Medium</option>
                                    <option value="low">Low</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="department">Department:</label>
                                <option value="">--select department</option>
                                <select id="department" class="form-select" name="department_id" style="height: 40px;">
                                  @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                                  @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="subdepartment">Sub-department:</label>

                                <select id="subdepartment" class="form-select" name="sub_department_id" style="height: 40px;">
                                  @foreach($sub_departments as $sub_department)
                                    <option value="{{$sub_department->id}}">{{$sub_department->sub_department_name}}</option>
                                  @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                              <label for="users">Assign ticket to</label>

                                <select class="form-select" name="user_id" style="height: 40px;">
                                    @foreach($users as $user)
                                      <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                  <!--endcolumn1-->

                    <div class="form-group">
                        <label for="message">Problem</label>
                        <textarea id="message" class="form-control" name="problem"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="picture">Upload picture if possible</label>
                        <input type="file" class="file" name="ticket_image" id="input-b1" data-mdb-file-upload="file-upload"/>
                    </div>

                    <div class="form-group">
                        <label for="message">--Comments/Updates</label>
                        <textarea id="message" class="form-control" name="comments"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="date">--Select Due date</label>
                          <input type="date" name="due_date" placeholder="Select date" class="form-control datepicker">
                    </div>

                  <!--endcolumn2-->
                </div>




          <div class="form-group pt-2">
              <button type="submit" style="font-size: 1.2rem;" class="btn btn-primary">Send</button>
          </div>
        </div>
        </form>
      </div>

</div>
</div>

  <script>
      /*  // JavaScript to handle dependent dropdowns
        const departmentDropdown = document.getElementById("department");
        const subdepartmentDropdown = document.getElementById("subdepartment");

        // Define sub-departments for each department
        const subdepartments = {
            hr: ["Recruitment of employees", "Training", "Employee Relations"],
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
        departmentDropdown.addEventListener("change", populateSubdepartments); */


    </script>

@endsection
